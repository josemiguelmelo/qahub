$(document).ready(function() {

    questionContent = $("#question-content").text();

    if(questionContent != "")
    {
        youtubeId = linkifyYouTubeURLs(questionContent);
        if(youtubeId != null)
        {
            //access actual regex match
            youtubeId = youtubeId[1];

            $(".youtube-player").append('<iframe width="560" height="315" src="https://www.youtube.com/embed/' + youtubeId + '" frameborder="0" allowfullscreen></iframe>');
            $(".youtube-player").show();
        }
    }


});

function linkifyYouTubeURLs(text) {
    var regex = /https?:\/\/(?:[0-9A-Z-]+\.)?(?:youtu\.be\/|youtube(?:-nocookie)?\.com\S*[^\w\s-])([\w-]{11})(?=[^\w-]|$)(?![?=&+%\w.-]*(?:['"][^<>]*>|<\/a>))[?=&+%\w.-]*/ig;
    var pattern = new RegExp(regex);
    return pattern.exec(text);
}