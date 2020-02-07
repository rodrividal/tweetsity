function hideTweet(url, element) {
    var tweetId = element.id;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    jQuery.ajax({
        url: url,
        method: 'POST',
        data: {
            tweet_id: tweetId,
        },
        success: function(result){
            if (result.new) {
                element.innerHTML = 'Un-hide tweet';
                alert('Perfect! Now your tweet is hidden.')
            }
            else {
                element.innerHTML = 'Hide tweet';
                alert('Great! Your tweet is public again.')
            }
        }
    });
}
