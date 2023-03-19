const labels = document.querySelectorAll('.form-control label')

labels.forEach(label =>{
    label.innerHTML = label.innerText //get all the text
    .split('') //split the letter into the array
    .map((letter,idx)=> `<span style="transition-delay:${idx*40}ms">${letter}</span>`)//use in array to turn into something else idx mean index start with 0
    .join('')
    //turn back into string
})