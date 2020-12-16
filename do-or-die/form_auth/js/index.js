function stopFormSubmitOnReload(){
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
}
stopFormSubmitOnReload()