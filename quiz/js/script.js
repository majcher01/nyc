function submitanswers(){
    var q1 = document.forms["quizform"]["q1"].value;


    var answers = ["c"];

    if(eval("q1") == answers){
        alert("poprawna odpowiedz");
    }else{
        alert('zla odpowiedz');
    }

    return false;
}