const recordButton = document.querySelector("#record");
recordButton.addEventListener("click", () => {
	record()
})

let mic, recorder, soundFile;
let status=0

function setup(){
	//Init
	mic=new p5.AudioIn();
	recorder=new p5.SoundRecorder();
	soundFile=new p5.SoundFile();
	
	//Setup
	recorder.setInput(mic);
}

function record(){
	mic.start();
	recorder.record(soundFile);
}