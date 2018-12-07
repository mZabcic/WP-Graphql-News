import {ScrollToElement} from './scroll-to';
//import {ButtonLoading} from './button-loading';
import {AjaxResponse} from './ajaxresponse';

$(function() {
  const scrollTo = new ScrollToElement();

  scrollTo.scrolltoGlobalElement();
  scrollTo.scrolltoTopElement();

  window.onscroll = function(){
    scrollTo.onWindowScroll();
  }

  // Accordion
  $('.accordion__toggle').bind('click',function(e){
    e.preventDefault();
    $(this).parent().parent().find('.accordion__content').slideToggle();
    $(this).parent().find('.accordion__circle-plus').toggleClass('is-opened');
  });

  //const btnLoading = new ButtonLoading();
  //btnLoading.bindLoading();


  const ajaxresponse = new AjaxResponse();

  ajaxresponse.call('userinfo',{}, function(data){
    console.log(data);
  });


  ajaxresponse.linkBind();

});


$('#filter').submit(function(){
  var filter = $('#filter');
  $.ajax({
    url:filter.attr('action'),
    data:filter.serialize(), // form data
    type:filter.attr('method'), // POST
    beforeSend:function(xhr){
      filter.find('button').text('Processing...'); // changing the button label
    },
    success:function(data){
      filter.find('button').text('Apply filter'); // changing the button label back
      $('#response').html(data); // insert data
    }
  });
  return false;
});