$(document).ready(function() {
    $('.questionTag').css('cursor', 'pointer');


    $('.questionTag').click(function() {
        document.location.href = BASE_URL + 'pages/questions/view_tag_questions.php?tag=' + this.innerHTML;
    });



});
