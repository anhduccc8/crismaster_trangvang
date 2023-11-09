var POPUP = {
    isShow: false,
    currentPopup: "",

    init: function(){
        //CrisMaster.set("#popup .holder", {opacity: 0, transformOrigin: ""});
    },
    show: function(callback){
        $("#popup").removeClass("helper-hide");
        CrisMaster.set("#popup .holder", {scaleX: 0.5, scaleY: 0.5, opacity: 0});
    },
    hide: function(callback){
        $("#popup").addClass("helper-hide");
    }
}