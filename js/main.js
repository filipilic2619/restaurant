
interact('.draggable').draggable({

        inertia: true,

        restrict: {
            restriction: "parent",
            endOnly: true,
            elementRect: { top: 0, left: 0, bottom: 1, right: 1 }
        },

        autoScroll: true,

        onmove: dragMoveListener,

        onend: function (event) {
            var parentPos = document.getElementById('demo').getBoundingClientRect()
            console.log(event.target.getBoundingClientRect().top - parentPos.top);
        }


    });

interact('.draggable')

    .on('doubletap', function (event) {

        event.currentTarget.remove();
    });




function dragMoveListener (event) {
    var target = event.target,

        x = (parseFloat(target.getAttribute('data-x')) || 0) + event.dx,
        y = (parseFloat(target.getAttribute('data-y')) || 0) + event.dy;


    target.style.webkitTransform =
        target.style.transform =
            'translate(' + x + 'px, ' + y + 'px)';


    target.setAttribute('data-x', x);
    target.setAttribute('data-y', y);
}


window.dragMoveListener = dragMoveListener;
