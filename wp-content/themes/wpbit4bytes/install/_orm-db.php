<?php

class PW_Orders_DB extends PW_DB {

/**
 * Get things started
 *
 * @access  public
 * @since   1.0
*/
public function __construct() {

	global $wpdb;

	$this->table_name  = $wpdb->prefix . 'pw_orders';
	$this->primary_key = 'order_id';
	$this->version     = '1.0';

}
	
	/**
	 * Get columns and formats
	 *
	 * @access  public
	 * @since   1.0
	*/
	public function get_columns() {
		return array(
			'order_id'    => '%d',
			'customer_id' => '%d',
			'email'       => '%s',
			'subtotal'    => '%f',
			'total'       => '%f',
			'tax'         => '%f',
			'gateway'     => '%s',
			'ip'          => '%s',
			'status'      => '%s',
			'date'        => '%s',
		);
	}

	/**
	 * Get default column values
	 *
	 * @access  public
	 * @since   1.0
	*/
	public function get_column_defaults() {
		return array(
			'customer_id' => 0,
			'subtotal'    => '',
			'total'       => '',
			'tax'         => '',
			'gateway'     => '',
			'ip'          => '',
			'gateway'     => '',
			'status'      => '',
			'date'        => date( 'Y-m-d H:i:s' ),
		);
	}

/**
 * Retrieve orders from the database
 *
 * @access  public
 * @since   1.0
 * @param   array $args
 * @param   bool  $count  Return only the total number of results found (optional)
*/
public function get_orders( $args = array(), $count = false ) {

	global $wpdb;

	$defaults = array(
		'number'       => 20,
		'offset'       => 0,
		'order_id'     => 0,
		'status'       => '',
		'email'        => '',
		'orderby'      => 'order_id',
		'order'        => 'DESC',
	);

	$args  = wp_parse_args( $args, $defaults );

	if( $args['number'] < 1 ) {
		$args['number'] = 999999999999;
	}

	$where = '';

	// specific referrals
	if( ! empty( $args['order_id'] ) ) {

		if( is_array( $args['order_id'] ) ) {
			$order_ids = implode( ',', $args['order_id'] );
		} else {
			$order_ids = intval( $args['order_id'] );
		}

		$where .= "WHERE `order_id` IN( {$order_ids} ) ";

	}

	if( ! empty( $args['status'] ) ) {

		if( empty( $where ) ) {
			$where .= " WHERE";
		} else {
			$where .= " AND";
		}

		if( is_array( $args['status'] ) ) {
			$where .= " `status` IN('" . implode( "','", $args['status'] ) . "') ";
		} else {
			$where .= " `status` = '" . $args['status'] . "' ";
		}

	}

	if( ! empty( $args['email'] ) ) {

		if( empty( $where ) ) {
			$where .= " WHERE";
		} else {
			$where .= " AND";
		}

		if( is_array( $args['email'] ) ) {
			$where .= " `email` IN(" . implode( ',', $args['email'] ) . ") ";
		} else {
			if( ! empty( $args['search'] ) ) {
				$where .= " `email` LIKE '%%" . $args['email'] . "%%' ";
			} else {
				$where .= " `email` = '" . $args['email'] . "' ";
			}
		}

	}

	if( ! empty( $args['date'] ) ) {

		if( is_array( $args['date'] ) ) {

			if( ! empty( $args['date']['start'] ) ) {

				if( false !== strpos( $args['date']['start'], ':' ) ) {
					$format = 'Y-m-d H:i:s';
				} else {
					$format = 'Y-m-d 00:00:00';
				}

				$start = date( $format, strtotime( $args['date']['start'] ) );

				if( ! empty( $where ) ) {

					$where .= " AND `date` >= '{$start}'";

				} else {

					$where .= " WHERE `date` >= '{$start}'";

				}

			}

			if( ! empty( $args['date']['end'] ) ) {

				if( false !== strpos( $args['date']['end'], ':' ) ) {
					$format = 'Y-m-d H:i:s';
				} else {
					$format = 'Y-m-d 23:59:59';
				}

				$end = date( $format, strtotime( $args['date']['end'] ) );

				if( ! empty( $where ) ) {

					$where .= " AND `date` <= '{$end}'";

				} else {

					$where .= " WHERE `date` <= '{$end}'";

				}

			}

		} else {

			$year  = date( 'Y', strtotime( $args['date'] ) );
			$month = date( 'm', strtotime( $args['date'] ) );
			$day   = date( 'd', strtotime( $args['date'] ) );

			if( empty( $where ) ) {
				$where .= " WHERE";
			} else {
				$where .= " AND";
			}

			$where .= " $year = YEAR ( date ) AND $month = MONTH ( date ) AND $day = DAY ( date )";
		}

	}

	$args['orderby'] = ! array_key_exists( $args['orderby'], $this->get_columns() ) ? $this->primary_key : $args['orderby'];

	if ( 'total' === $args['orderby'] ) {
		$args['orderby'] = 'total+0';
	} else if ( 'subtotal' === $args['orderby'] ) {
		$args['orderby'] = 'subtotal+0';
	}

	$cache_key = ( true === $count ) ? md5( 'pw_orders_count' . serialize( $args ) ) : md5( 'pw_orders_' . serialize( $args ) );

	$results = wp_cache_get( $cache_key, 'orders' );

	if ( false === $results ) {

		if ( true === $count ) {

			$results = absint( $wpdb->get_var( "SELECT COUNT({$this->primary_key}) FROM {$this->table_name} {$where};" ) );

		} else {

			$results = $wpdb->get_results(
				$wpdb->prepare(
					"SELECT * FROM {$this->table_name} {$where} ORDER BY {$args['orderby']} {$args['order']} LIMIT %d, %d;",
					absint( $args['offset'] ),
					absint( $args['number'] )
				)
			);

		}

		wp_cache_set( $cache_key, $results, 'orders', 3600 );

	}

	return $results;

}

	/**
	 * Return the number of results found for a given query
	 *
	 * @param  array  $args
	 * @return int
	 */
	public function count( $args = array() ) {
		return $this->get_orders( $args, true );
	}

	/**
	 * Create the table
	 *
	 * @access  public
	 * @since   1.0
	*/
	public function create_table() {

		global $wpdb;

		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

		$sql = "CREATE TABLE " . $this->table_name . " (
		order_id bigint(20) NOT NULL AUTO_INCREMENT,
		customer_id bigint(20) NOT NULL,
		email mediumtext NOT NULL,
		subtotal mediumtext NOT NULL,
		total mediumtext NOT NULL,
		tax mediumtext NOT NULL,
		gateway tinytext NOT NULL,
		ip tinytext NOT NULL,
		status varchar(30) NOT NULL,
		date datetime NOT NULL,
		PRIMARY KEY  (order_id)
		) CHARACTER SET utf8 COLLATE utf8_general_ci;";

		dbDelta( $sql );

		update_option( $this->table_name . '_db_version', $this->version );
	}
}