document.addEventListener('DOMContentLoaded', function() 
{
    const emojiRadios = document.querySelectorAll('.emoji-radio');
    emojiRadios.forEach(radio => {
        radio.addEventListener('change', function() {
            emojiRadios.forEach(r => {
                if (r !== this) {
                    r.checked = false;
                }
            });
        });
    });
});