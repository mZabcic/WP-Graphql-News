export class ButtonLoading {
  constructor(
    element = '.js-bt-loadmore'
  ) {
    this.element = element;
  }

  setLoading(element) {
    $(element).click((event) => {
      event.preventDefault();
      this.addClass('is-loading');
    });
  }

  bindLoading() {
    $(this.element).click(function(e,item){
      e.preventDefault();
      $(this).addClass('is-loading');
    });
  }
/*
  callAjaxRequest(url, data){
    var data = {
        'action': 'userinfo',    // We pass php values differently!
        data:filter.serialize(), // form data
    type:filter.attr('method'), // POST
    
	};
    //Disable our button
    $('#ajax_button').attr("disabled", true);
                    
    //The URL that we are sending an Ajax request to.
    //For this example, I'm sending a Ajax request to the current page.
    var url = window.location.href;

    $.ajax({
        url: url,
        success: function(data){
            //The Ajax request was a success.
            //Do something in here.
        },
        
        complete: function(){
            //Ajax request is finished, so we can enable
            //the button again.
            $('#ajax_button').attr("disabled", false);
        }
    });
  }
  */
}
