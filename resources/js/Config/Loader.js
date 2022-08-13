
const setAppFocus = (bool = false,inputFocusable)=>{
  const app = document.querySelector('body');
if(bool){
  app.onkeydown = (e)=>{e.preventDefault(); inputFocusable.focus()}
}else{
  app.onkeydown = null;
}
}

const removeLoader = () => {
  const div = document.getElementById("content-loader");
  if (div) div.remove();
  setAppFocus(false);
};

const showLoader = () => {
  removeLoader();

  const div = document.createElement("div");
  div.id = "content-loader";

  const loader = document.createElement("span");
  loader.classList.add("loader");

  const input = document.createElement("input");
  input.type = "text";
  input.focus();
  input.hidden = true;

  div.append(input);
  div.append(loader);
  document.querySelector("body").append(div);
  
  setAppFocus(true,input);
};
export { showLoader, removeLoader };
