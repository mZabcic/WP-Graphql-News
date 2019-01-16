import './style.scss';
import './editor.scss';

const { __, setLocaleData } = wp.i18n;
const {
	registerBlockType,
} = wp.blocks;
const {
	RichText,
	MediaUpload,
} = wp.editor;
const { Button } = wp.components;
const { InnerBlocks } = wp.editor;
const { PostFeaturedImage } = wp.editor;

registerBlockType( 'cgb/block-picture-with-button-block', {
	// Block name. Block names must be string that contains a namespace prefix. Example: my-plugin/my-custom-block.
	title: __( 'Featured image with inner' ),
	icon: 'format-image',
	category: 'common',
	keywords: [
		__( 'my-block — CGB Block' ),
		__( 'CGB Example' ),
		__( 'create-guten-block' ),
	],
	attributes: {
		mediaID: {
			type: 'number',
		},
		mediaURL: {
			type: 'string',
			source: 'children',
			selector: 'img',
			attribute: 'src',
		},
		show: {
			type: 'boolean',
			default : false
		},
	},
	edit: ( props ) => {
		const {
			className,
			attributes: {
				mediaID,
				mediaURL,
				show
			},
			setAttributes,
		} = props;

		const onSelectImage = ( media ) => {
			setAttributes( {
				mediaURL: media.url,
				mediaID: media.id,
				show : true
			} );
		};
		console.log(show);
		return (
			
			<div className={ className }>
				<div>
				<MediaUpload
						onSelect={ onSelectImage }
						allowedTypes="image"
						value={ mediaID }
						render={ ( { open } ) => (
							<Button className={ mediaID ? 'image-button' : 'button button-large' } onClick={ open }>
								{ ! mediaID ? __( 'Upload Image', 'gutenberg-examples' ) : <img src={ mediaURL } /> }
							</Button>
						) }
					/> 
				</div>
				{show &&
				<div class="inner-block-wrapper">
					<InnerBlocks />
				</div>
				}
			</div>
		);
	},
	save: ( props ) => {
		const {
			className,
			attributes: {
				mediaURL,
			},
		} = props;
		var divStyle = {
			backgroundImage: 'url(' + mediaURL + ')'
		};
		return (
			<div className={ className }>
				<div class="background-image" style={divStyle}>	
					<InnerBlocks.Content />
				</div>	
			</div>
		);
	},
} );