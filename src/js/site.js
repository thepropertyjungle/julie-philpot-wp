/*
    ATTENTION
    =========
    This file can be used for theme specific JavaScript functions
    and importing plugins.
*/

import "../js/plugins/lazy-load-html";






//hide and show featured/sold property feeds

document.addEventListener('DOMContentLoaded', function() {
    // Initially hide the 'sold' shortcode
    document.querySelector('.sold').style.display = 'none';

    // Add click event listeners to the buttons
    document.querySelector('.for-sale').addEventListener('click', function() {
        // Show 'featured' shortcode
        document.querySelector('.featured').style.display = 'block';
        // Hide 'sold' shortcode
        document.querySelector('.sold').style.display = 'none';
        
        // Add 'active' class to clicked button and remove it from others
        document.querySelector('.for-sale').classList.add('active');
        document.querySelector('.sold-btn').classList.remove('active');
        
        // Remove 'disabled' class from 'sold-btn' button
        document.querySelector('.sold-btn').classList.add('disabled');
        
        // Add 'disabled' class to 'for-sale' button
        document.querySelector('.for-sale').classList.remove('disabled');
    });

    document.querySelector('.sold-btn').addEventListener('click', function() {
        // Show 'sold' shortcode
        document.querySelector('.sold').style.display = 'block';
        // Hide 'featured' shortcode
        document.querySelector('.featured').style.display = 'none';
        
        // Add 'active' class to clicked button and remove it from others
        document.querySelector('.sold-btn').classList.add('active');
        document.querySelector('.for-sale').classList.remove('active');
        
        // Remove 'disabled' class from 'for-sale' button
        document.querySelector('.for-sale').classList.add('disabled');
        
        // Add 'disabled' class to 'sold-btn' button
        document.querySelector('.sold-btn').classList.remove('disabled');
    });
    
    // Add initial 'disabled' class to 'sold-btn' button
    document.querySelector('.sold-btn').classList.add('disabled');
});
