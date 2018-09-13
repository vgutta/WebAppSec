let showMsgs = function(msgs){
    let msgUl = document.getElementById("msg");
    msgUl.innerHTML = '';
    for(let i = 0; i < msgs.length; i++){
        let newLi = document.createElement("li");
        newLi.innerHTML = `${msgs[i].author}: ${msgs[i].msg}`;
        msgUl.appendChild(newLi);
    }
}

let loadMessages = function( callback){
    var xhr = new XMLHttpRequest();
    xhr.onload = function(){
        if (this.status == 200){
            //let msgs = (JSON.parse(this.response));
            showMsgs(JSON.parse(this.response));
        }
    };
    xhr.open("GET", "chatroom/hi");
    xhr.send();
}

let sendMessage = function(payload){
    console.log(payload);
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "chatroom", false);
    
    //Send the proper header information along with the request
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    
    xhr.onreadystatechange = function() {//Call a function when the state changes.
        if(this.readyState == XMLHttpRequest.DONE && this.status == 200) {
            let msgs = (JSON.parse(this.response));
            showMsgs(msgs);
        }
    }
    xhr.send(payload);
}

loadMessages();

document.getElementById("submitButton").addEventListener("click", function(evt){
    let author = document.getElementById("author").value;
    let msg = document.getElementById("message").value;
    let obj = {author: author, msg: msg};
    let payload = Object.keys(obj).map(k => `${encodeURIComponent(k)}=${encodeURIComponent(obj[k])}`).join('&');
    sendMessage(payload);

});