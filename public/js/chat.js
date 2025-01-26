const closeChat = ()=>{
    document.getElementById("chat-content")
    .style.display = "none";
}
const openChat = ()=>{
    const xx = document.getElementById("chat-content");
    xx.style.display = xx.style.display=="block" ? "none" : "block";
}