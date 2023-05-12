var averagediv = document.getElementById('averagecolor');
var averageimage = document.getElementById('imagen');

function getaverageColor(imagen) {
  var r=0, g=0, b=0, count = 0, canvas, ctx, imageData, data, i;
  canvas = document.createElement('canvas');
  ctx = canvas.getContext("2d");
  canvas.width = imagen.width;
  canvas.height = imagen.height;
  ctx.drawImage(imagen, 0, 0);
  imageData = ctx.getImageData(0, 0, imagen.width, imagen.height);
  data = imageData.data;
  for(i = 0, n = data.length; i < n; i += 4) {
    ++count;
    r += data[i];
    g += data[i+1];
    b += data[i+2];
  }
  r = ~~(r/count);
  g = ~~(g/count);
  b = ~~(b/count);
  return [r, g, b];
}

function rgbToHex(arr) {
  return "#" + ((1 << 24) + (arr[0] << 16) + (arr[1] << 8) + arr[2]).toString(16).slice(1);
}

 function uploadImage(e) {
   var image = new Image();
   image.src = e.target.result;
   image.onload = function() {
     switchImage(this);
   }
 }
function switchImage(image) {
  var averagecolor = getaverageColor(image);
  var color = rgbToHex(averagecolor);
  averageimage.src = image.src;
  averagediv.style.backgroundColor = averagediv.textContent = color;
}

function setDefaultImage() {
  var image = new Image();
  image.src = "data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/4gIoSUNDX1BST0ZJTEUAAQEAAAIYAAAAAAQwAABtbnRyUkdCIFhZWiAAAAAAAAAAAAAAAABhY3NwAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAQAA9tYAAQAAAADTLQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAlkZXNjAAAA8AAAAHRyWFlaAAABZAAAABRnWFlaAAABeAAAABRiWFlaAAABjAAAABRyVFJDAAABoAAAAChnVFJDAAABoAAAAChiVFJDAAABoAAAACh3dHB0AAAByAAAABRjcHJ0AAAB3AAAADxtbHVjAAAAAAAAAAEAAAAMZW5VUwAAAFgAAAAcAHMAUgBHAEIAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAFhZWiAAAAAAAABvogAAOPUAAAOQWFlaIAAAAAAAAGKZAAC3hQAAGNpYWVogAAAAAAAAJKAAAA+EAAC2z3BhcmEAAAAAAAQAAAACZmYAAPKnAAANWQAAE9AAAApbAAAAAAAAAABYWVogAAAAAAAA9tYAAQAAAADTLW1sdWMAAAAAAAAAAQAAAAxlblVTAAAAIAAAABwARwBvAG8AZwBsAGUAIABJAG4AYwAuACAAMgAwADEANv/bAEMAAwICAgICAwICAgMDAwMEBgQEBAQECAYGBQYJCAoKCQgJCQoMDwwKCw4LCQkNEQ0ODxAQERAKDBITEhATDxAQEP/bAEMBAwMDBAMECAQECBALCQsQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEP/AABEIABwAHAMBIgACEQEDEQH/xAAZAAACAwEAAAAAAAAAAAAAAAAGBwEDBQj/xAAuEAABAwIFAgUCBwAAAAAAAAABAgMEBREABgcSITFBCBNRYXEUkSIjMjNigaH/xAAXAQADAQAAAAAAAAAAAAAAAAAEBgcF/8QAJREAAQQCAQEJAAAAAAAAAAAAAQIDBBEABSESBgcjMUFxgaHB/9oADAMBAAIRAxEAPwB+5Um6a+JDLz1dp0dhqozI5StYFkvWJTsKBcbAQeOvBJ4wBeHHKj2nLOcMlS0JShnM7yWilRNgWmlAJvwP1HjFngu05q+iOmMSLmd1xctKnps0pBWlptW5SkpPcBN+fU4Z0Ckrpu6p1KQPr6nMXPkkIsLLJXsHuElKPhseuJy46WytCDYvKbpfEUC951xmpPS/VXTEQpOx+XsWkGxI3AWJ9/bBllbTVilw5H0IjqMuQqQ+lagdjpSlJSL9rJH3wuIVWp6K1CTJf2N1B9akbiBc2vxfryLfODhzUZFIDcCFl+PKZaQAlx2Wlkn2A7j+Q64I1zrNkqw3aNS+lDcYnnngZy9W/EvUqy0wir5Zdh0+O4lwxor/AJpkqB/AFkJRdINuAOnXFs3xGRKvUD5pmRG0flpSlgq7ckcf1gUpdCo2Y6cJtQprIUpNylu6Ufa+N6Hoxkmay3IeZlAXB8pLoCPi1r/7gKE0hYU3IJ+Mf5512sKFQWBR4PV+VglmzWZ6szW5UCnvsxYoLbDrgKCpXc2PT5xDGYtTKs0mbIzFToAX+20/JShWz1sTfrf7YV2sWd39M6/ComUcu0OMJzm1yQ5FLjibGwKQpRbB99hOBvJtPVmWkKq9VqdSXJefcKy3McbT1vwlJAHXsMbMXs/AUStS1/WL+77wndM4IUWMg16m79s//9k=";
  image.onload = function() {
    switchImage(this);
  }
}

 document.getElementById("upload").addEventListener("change", function(e){
 file = e.target.files[0];
  if (!file.type.match(/image.*/)) return;
   var reader = new FileReader();
   reader.onload = uploadImage;
   reader.readAsDataURL(file);
 });

setDefaultImage();