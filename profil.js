const imgDiv = document.querySelector('.profil-pic-div');
const img = document.querySelector('#photo');
const file = document.querySelector('#pic_file');
const uploadBtn = document.querySelector('#upload-btn');
//hover effect
imgDiv.addEventListener('mouseenter',function()
{
    uploadBtn.style.display="block"
});
imgDiv.addEventListener('mouseleave',function()
{
    uploadBtn.style.display="none"
});
//img change 
file.addEventListener('change',function()
{
    const choosedFile = this.files[0];

    if(choosedFile){
        const reader = new FileReader();
        reader.addEventListener('load',function()
        {
            img.setAttribute('src',reader.result);
        });
        reader.readAsDataURL(choosedFile);
    }
});