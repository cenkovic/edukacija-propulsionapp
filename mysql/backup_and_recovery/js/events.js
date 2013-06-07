/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
    
    //click
    $('#clickButton').on('click', function() {
        alert('CLICK');
    });
    
    //double click
    $('#dblclickButton').on('dblclick', function() {
        alert('DOUBLE CLICK');
    });
    
    //mouse enter
    $('#mouseenterButton').on('mouseenter', function() {
        alert('MOUSE ENTER');
    });
    
    //mouse leave
    $('#mouseleaveButton').on('mouseleave', function() {
        alert('MOUSE LEAVE');
    });
    
    //mouse down
    $('#mousedownButton').on('mousedown', function() {
        alert('MOUSE DOWN');
    });
    
    //mouse up
    $('#mouseupButton').on('mouseup', function() {
        alert('MOUSE UP');
    });
    
    //mouse move
    $('#mousemoveButton').on('mousemove', function() {
        alert('MOUSE MOVE');
    });
    
    //hover
    $('#hoverButton').hover(
        function() {
            alert('MOUSE ENTERED');
        },
        function() {
            alert('MOUSE LEFT');
        }
    );
        
    //toggle
    $('#toggleButton').on('click', function(){
        $('#toggling').toggle();
    });
    
    //focus
    $('#focusButton').on('click', function(){
        $('#focusInput').focus();
    });
    
    //blur
    $('#blurInput').on('blur', function(){
        alert('BLURED');
    });
    
    //keydown
    $('#keydownInput').on('keydown', function(){
        alert('KEY DOWN');
    });
    
    //keyup
    $('#keyupInput').on('keyup', function(){
        alert('KEY UP');
    });
    
    //keypress
    $('#keypressInput').on('keypress', function(){
        alert('KEY PRESS');
    });
    
});

