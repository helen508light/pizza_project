function x () {return;}
function FocusText() {
    document.forma.text.focus();
    document.forma.text.select();
    return true; }
function DoSmilie(addSmilie) {
    var revisedmsgage;
    var currentmsgage = document.forma.text.value;
    revisedmsgage = currentmsgage+addSmilie;
    document.forma.text.value=revisedmsgage;
    document.forma.text.focus();
    return;
}
function DoPrompt(action) { var revisedmsgage; var currentmsgage = document.forma.qmsgage.value; }