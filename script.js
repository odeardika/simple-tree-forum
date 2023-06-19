const sendLabel = document.getElementById('reply-label')
const addButton = document.getElementById('add-button')      
const divQuestion = document.getElementById('add-question')

function addReplyTextArea(index){
    const divReplySend = document.getElementById(`reply-div-${index}`)
    divReplySend.innerHTML = `<form action="function.php?id=${parseInt(index)}&type=2" method="post">`+
                             '<textarea autofocus name="reply" id="" cols="100%" rows="10"></textarea>'+
                             `<input type="submit" value="send" >`+
                             '</form>'
}

function addQuestion(){
        divQuestion.innerHTML = `<form action="function.php?type=1" method="post">`+
                                `<input type="text" placeholder="Category" name="cat">`+    
                                `<textarea autofocus name="question" id="question" rows="10"></textarea>`+
                                `<input type="submit" value="ask" ></form>`
    }

addButton.addEventListener('click', ()=>{
    username = divQuestion.getAttribute('user')
    addQuestion(username)
})
