const btn = document.querySelector('.talk');
const content = document.querySelector('.english');
const lang = document.getElementById('languages');


const SpeechRecognition =  window.SpeechRecognition || window.webkitSpeechRecognition;

const recognition = new SpeechRecognition();


recognition.onstart = function() {
   // console.log('Voice Is Activated, You Can Speak');


};

recognition.onresult = function(event) {
   // console.log(event);
    var text = event.results.item(0).item(0).transcript;
    content.innerHTML = text;
    trans();
};

btn.addEventListener('click', () => {
    recognition.lang =document.getElementById("from").value;
   recognition.start();
});

