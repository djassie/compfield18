window.addEventListener("load", compoundFieldselect);

function compoundFieldselect(){
  let selectBox = document.getElementById("edit-field-category");
  
  let nodeTitleBox = document.getElementById("edit-title-0-value");
  let nodeUrlBox = document.getElementById("edit-path-0-alias");
  let thumbUrlBox = document.getElementById("edit-field-compound-0-thumb-url");
  
  let spanTextBox = document.getElementById("edit-field-compound-0-spantext");
  let descripBox = document.getElementById("edit-field-compound-0-description");
  let sidebarTitleBox = document.getElementById("edit-field-compound-0-sidebar-title");
  let cardTitleBox = document.getElementById("edit-field-compound-0-card-title");
  let cardDescripBox = document.getElementById("edit-field-compound-0-card-description");
  let expLvlBox = document.getElementById("edit-field-compound-0-exp-lvl");
  let titleBox = document.getElementById("edit-field-compound-0-title");
  let urlBox = document.getElementById("edit-field-compound-0-article-url");
  
  let topicIdBox = document.getElementById("edit-field-compound-0-topic-id");
  let subtopicIdBox = document.getElementById("edit-field-compound-0-subtopic-id");
  let topicTextBox = document.getElementById("edit-field-compound-0-parent-topic");
  let subtopicTextBox = document.getElementById("edit-field-compound-0-sub-topic");
  
  const spanTextboxspanTag = document.createElement("SPAN");
  const DescripbpxspanTag = document.createElement("SPAN");
  const sideTitlboxspanTag = document.createElement("SPAN");
  const cardTitleboxspanTag = document.createElement("SPAN");
  const cardDescripboxspanTag = document.createElement("SPAN");    
  
  spanTextBox.parentNode.insertBefore(spanTextboxspanTag, spanTextBox.nextSibling);
  descripBox.parentNode.insertBefore(DescripbpxspanTag, descripBox.nextSibling);
  sidebarTitleBox.parentNode.insertBefore(sideTitlboxspanTag, sidebarTitleBox.nextSibling);
  cardTitleBox.parentNode.insertBefore(cardTitleboxspanTag, cardTitleBox.nextSibling);
  cardDescripBox.parentNode.insertBefore(cardDescripboxspanTag, cardDescripBox.nextSibling);

  nodeTitleBox.oninput = function(){
    titleBox.value = nodeTitleBox.value;
  }
  
  nodeUrlBox.oninput = function(){
    urlBox.value = "https://www.swapreference.com" + nodeUrlBox.value;
  }
  
  thumbUrlBox.value = "https://www.swapreference.com/default.png";
  
  selectBox.onchange = function(){
    let selectedOptionVal = selectBox.options[selectBox.selectedIndex].value;   
    let selectOptionText = selectBox.options[selectBox.selectedIndex].text;
    
    subtopicIdBox.value = selectedOptionVal;
    subtopicTextBox.value = selectOptionText.replace(/^-/, "");
    
    //let ifParent = isParent(selectOptionText);
    
    if(isParent(selectOptionText)){
      parentVal = selectedOptionVal;
    } else {
      parentVal = getParentAboveValue(selectedOptionVal);
    }

    topicIdBox.value = parentVal[0];
    topicTextBox.value = parentVal[1];
    
    function getParentAboveValue(e){ //argument must be number, and return number, enter option value(selectedOption)
      let opt = selectBox.querySelector(`option[value="${e}"]`);
      //console.log(opt);
      do {
        opt = opt.previousElementSibling;
      } while (opt && !isParent(opt.text)) //Test for found parent or nothing
      return opt ? [opt.value, opt.text] : null;
    }
    
    function isParent(e){
      if(e[0] == '-'){
        return false;
      } else {
        return true;
      }
    }
    
  }
  
  spanTextBox.oninput = function(){
    let spanTextBoxspanLength = 18 - spanTextBox.value.length;
    spanTextboxspanTag.innerHTML = spanTextBoxspanLength;
    if(spanTextBox.value.length < 5){
      spanTextboxspanTag.style.color = "#dcca00";
    } else if(spanTextBox.value.length > 5 && spanTextBox.value.length < 10){
      spanTextboxspanTag.style.color = "#bef900";
    } else if(spanTextBox.value.length > 10 && spanTextBox.value.length < 18){
      spanTextboxspanTag.style.color = "#6efa6e";
    } else if(spanTextBox.value.length > 18){
      spanTextboxspanTag.style.color = "red";
    }
  }
  
  descripBox.oninput = function(){
    let descripBoxspanLength = 155 - descripBox.value.length;
    DescripbpxspanTag.innerHTML = descripBoxspanLength;
    if(descripBox.value.length < 140){
      DescripbpxspanTag.style.color = "#dcca00";
    } else if(descripBox.value.length > 140 && descripBox.value.length < 145){
      DescripbpxspanTag.style.color = "#bef900";
    } else if(descripBox.value.length > 145 && descripBox.value.length < 155){
      DescripbpxspanTag.style.color = "#6efa6e";
    } else if(descripBox.value.length > 155){
      DescripbpxspanTag.style.color = "red";
    }
  }
  
  sidebarTitleBox.oninput = function(){    
    let sidebarTextLength = 21 - sidebarTitleBox.value.length;
    sideTitlboxspanTag.innerHTML = sidebarTextLength;
    if(sidebarTitleBox.value.length < 7){
      sideTitlboxspanTag.style.color = "#dcca00";
    } else if(sidebarTitleBox.value.length > 7 && sidebarTitleBox.value.length < 12){
      sideTitlboxspanTag.style.color = "#bef900";
    } else if(sidebarTitleBox.value.length > 12 && sidebarTitleBox.value.length < 21){
      sideTitlboxspanTag.style.color = "#6efa6e";
    } else if( sidebarTitleBox.value.length > 21){
      sideTitlboxspanTag.style.color = "red";
    }
  }
  
  cardTitleBox.oninput = function(){
    let cardTitleBoxspanLength = 18 - cardTitleBox.value.length;
    cardTitleboxspanTag.innerHTML = cardTitleBoxspanLength;
    if(cardTitleBox.value.length < 7){
      cardTitleboxspanTag.style.color = "#dcca00";
    } else if(cardTitleBox.value.length > 7 && cardTitleBox.value.length < 11){
      cardTitleboxspanTag.style.color = "#bef900";
    } else if(cardTitleBox.value.length > 11 && cardTitleBox.value.length < 18){
      cardTitleboxspanTag.style.color = "#6efa6e";
    } else if(cardTitleBox.value.length > 18){
      cardTitleboxspanTag.style.color = "red";
    }
  }
  
  cardDescripBox.oninput = function(){
    let cardDescripBoxspanLength = 76 - cardDescripBox.value.length;
    cardDescripboxspanTag.innerHTML = cardDescripBoxspanLength;
    if(cardDescripBox.value.length < 63){
      cardDescripboxspanTag.style.color = "#dcca00";
    } else if(cardDescripBox.value.length > 63 && cardDescripBox.value.length < 69){
      cardDescripboxspanTag.style.color = "#bef900";
    } else if(cardDescripBox.value.length > 69 && cardDescripBox.value.length < 76){
      cardDescripboxspanTag.style.color = "#6efa6e";
    } else if(cardDescripBox.value.length > 76){
      cardDescripboxspanTag.style.color = "red";
    }
  }
  
  expLvlBox.value = 2;
}