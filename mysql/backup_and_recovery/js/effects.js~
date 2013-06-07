/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
    
    //show and hide
    $('#showButton').on('click', function() {
        $('#showHideCode').show('slow', function(){
            alert('ELEMENT DISPLAYED');
        });
    });
    $('#hideButton').on('click', function() {
        $('#showHideCode').hide(5000);
    });
    
    //toggle
    $('#toggleButton').on('click', function() {
        $('#toggleCode').toggle('slow');
    });
    
    //slide down and slide up
    $('#slideDownButton').on('click', function() {
        $('#slideUpDownCode').slideDown(4523);
    });
    $('#slideUpButton').on('click', function() {
        $('#slideUpDownCode').hide('fast', function(){
            alert('ELEEMENT HIDDEN');
        });
    });
    
    //toggle
    $('#slideToggleButton').on('click', function() {
        $('#slideToggleCode').slideToggle('slow');
    });
    
    //fade in and fade out
    $('#fadeInButton').on('click', function() {
        $('#fadeInOutCode').fadeIn('slow');
    });
    $('#fadeOutButton').on('click', function() {
        $('#fadeInOutCode').fadeOut(4000);
    });
    
    //fade toggle
    $('#fadeToggleButton').on('click', function() {
        $('#fadeToggleCode').fadeToggle(2500, function(){
            alert('FADED');
        });
    });
    
    //animate
    $('#animateButton').on('click', function() {
        $(this).animate({'font-size': 100}, 10000, function(){
            alert('ANIMATION FINISHED');
        });
    });
    
    //stop animate
    $('#stopButton').on('click', function() {
        $('#animateButton').stop();
    })
    
});

