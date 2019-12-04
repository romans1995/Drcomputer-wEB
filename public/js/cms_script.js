String.prototype.permalink = function () {
  return this.toString().trim().toLowerCase().replace(/\s/g, '-');
};

$('.source-text').on('focusout', function () {
  $('.target-text').val($(this).val().permalink());

});

$('#article').summernote({


  placeholder: 'write your text here !',
  tabsize: 2,
  height: 100,



});