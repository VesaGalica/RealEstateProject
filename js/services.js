// JavaScript source code

feature1 = document.getElementsByClassName('feature-1')[0]
feature2 = document.getElementsByClassName('feature-2')[0]
feature3 = document.getElementsByClassName('feature-3')[0]
feature4 = document.getElementsByClassName('feature-4')[0]


function blurred(feature,arr) {
    feature.style.transform = 'scale(1.05)';
    feature.style.transition = '.5s ease';
    for (i = 0; i < arr.length; i++) {
        arr[i].style.opacity =0.5;
        arr[i].style.transition = '.5s ease';
    }
}

function unBlurred(feature,arr) {
    feature.style.transform = 'scale(1)';
    feature.style.transition = '.5s ease';
    for (i = 0; i < arr.length; i++) {
        arr[i].style.opacity = 1;
        arr[i].style.transition = '.5s ease';
    }
}


feature1.addEventListener('mouseover', function () {
    let arr = [feature2, feature3, feature4];
    blurred(feature1,arr);
})

feature1.addEventListener('mouseout', function () {
    let arr = [feature2, feature3, feature4];
    unBlurred(feature1,arr);
})

feature2.addEventListener('mouseover', function () {
    let arr = [feature1, feature3, feature4];
    blurred(feature2, arr);
})

feature2.addEventListener('mouseout', function () {
    let arr = [feature1, feature3, feature4];
    unBlurred(feature2, arr);
})

feature3.addEventListener('mouseover', function () {
    let arr = [feature1, feature2, feature4];
    blurred(feature3, arr);
})

feature3.addEventListener('mouseout', function () {
    let arr = [feature1, feature2, feature4];
    unBlurred(feature3, arr);
})

feature4.addEventListener('mouseover', function () {
    let arr = [feature1, feature2, feature3];
    blurred(feature4, arr);
})

feature4.addEventListener('mouseout', function () {
    let arr = [feature1, feature2, feature3];
    unBlurred(feature4, arr);
})