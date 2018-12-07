export class AjaxResponse {
    constructor(
      globalElement = '.js-scroll-to-anchor'
    ) {
      this.globalElement = globalElement;
    }

    getAjaxUrl(){
        return themeLocalization.ajaxurl;
    }
  
    call(action, data = {}, callback = function(){ } ) {
      data.action = action;
        $.ajax({
          url:this.getAjaxUrl(),
          data:data, // form data
          //type:filter.attr('method'), // POST
          beforeSend:function(xhr){
            //alert('Processing...'); // changing the button label
          },
          success:function(data){
            //filter.find('button').text('Apply filter'); // changing the button label back
            callback(data);
            //$('#response').html(data); // insert data
          }
        });
        return false;
    }

    callWithLoading(button, action, data = {}, callback = function(){ } ) {

      var btn = $(button);
      data.action = action;
      btn.bind('click',function(e){
         e.preventDefault();
         var $btn = $(this);
         $.ajax({
          url:this.getAjaxUrl(),
          data:data,
          beforeSend:function(xhr){
            $btn.addClass('is-loading');
          },
          success:function(data){
            //filter.find('button').text('Apply filter'); // changing the button label back
            callback(data);
            $btn.removeClass('is-loading');
            //$('#response').html(data); // insert data
          }
        });
        return false;
      });
    }


    linkBind(){
      var url = this.getAjaxUrl();
      $('.js-bt-loadmore').each(function(i,item){
        
        $(item).on('click',function(e){
           e.preventDefault();
           var $this = $(item);
           console.log($this);
           var data = {};
           if(typeof $this.attr('data-query') !== "undefined" ){
              data = $this.attr('data-query');
           }
           console.log(data);
           var action = $this.attr('data-action');
           var element = $($this.attr('data-responseto'));
           data.action =action;
           $.ajax({
              url: url,
              data:data,
              beforeSend:function(xhr){
                $this.addClass('is-loading');
              },
              success:function(data){
                $this.removeClass('is-loading');
                element.html(data); // insert data
              }
            });
        });
      })
    }
    

    formSubmit(action, formselector, callback = function(){ }) {
        var filter = $(formselector);
        $.ajax({
          url:filter.attr('action'),
          data:filter.serialize(), // form data
          type:filter.attr('method'), // POST
          beforeSend:function(xhr){
            alert('Processing...'); // changing the button label
          },
          success:function(data){
            filter.find('button').text('Apply filter'); // changing the button label back
            $('#response').html(data); // insert data
          }
        });
        return false;
    }
  
 
  }
  