
document.addEventListener('DOMContentLoaded', () => {
    // Check if we're on the admin page for the 'skills' post type
    const isSkillsPostType = document.body.classList.contains('post-type-skills');

    if (!isSkillsPostType) return;

    const addButton = document.getElementById('add-chip-button');
    const container = document.getElementById('chips-container');

    if (addButton && container) {
        addButton.addEventListener('click', () => {
            const newField = document.createElement('div');
            newField.classList.add('chip-row');
            newField.innerHTML = `
                <input type="text" name="skills_chips[]" value="" placeholder="Skill Chip">
                <button type="button" class="remove-chip">Remove</button>
            `;
            container.appendChild(newField);
        });

        container.addEventListener('click', (event) => {
            if (event.target && event.target.classList.contains('remove-chip')) {
                event.target.closest('.chip-row').remove();
            }
        });
    }
});
