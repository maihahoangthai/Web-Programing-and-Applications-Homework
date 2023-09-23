let imageList = document.getElementById("imageList");
let size = imageList.options.length;
let imageIndex = 0;
let isSlideshow = false;
let intervalHolder;
let nextBtn = document.getElementById("nextBtn");
let backBtn = document.getElementById("backBtn");

function selectImage(){
    var index = imageList.selectedIndex;
    //console.log(index);
    displayImage(index);
}

function displayImage(index){
    let imageView = document.getElementById('imageView');
    let imageLabel = document.getElementById('imageLabel');
    
    let imageName = imageList.options[index].value;
    //console.log(imageName);
    let url = 'images/' + imageName;

    imageView.setAttribute('src', url);
    imageLabel.innerHTML = imageName + '(' + (index + 1) + '/' + size + ')';

    //Bằng cách Trả về giá trị "true" cho ".options[phần tử thứ].selected", ta khiến danh sách phải chọn vào option đang được đề cập
    imageList.options[index].selected = true;
}

function prevImage(){
    imageIndex --;
    if(imageIndex === -1){
        imageIndex = size -1;
    }
    displayImage(imageIndex);
}

function nextImage(){
    imageIndex ++;
    if(imageIndex === size){
        imageIndex = 0;
    }
    displayImage(imageIndex);
}

function startSlideshow(){
    if(isSlideshow === false){
        intervalHolder = setInterval(nextImage,1000);
        isSlideshow = true;
        document.getElementById("slideshow").innerHTML = "Stop slideshow";
        nextBtn.disabled = true;
        backBtn.disabled = true;
    }
    else{
        clearInterval(intervalHolder);
        isSlideshow = false;
        document.getElementById("slideshow").innerHTML = "Start slideshow";
        nextBtn.disabled = false;
        backBtn.disabled = false;
    }
}