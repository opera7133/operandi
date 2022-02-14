window.onload = function () {
  const $parents = document.querySelectorAll(
    '.customize-control-multiple-checkbox',
  );

  $parents.forEach((parent) => {
    const $checkboxes = parent.querySelectorAll('input[type="checkbox"]');
    const $hidden = parent.querySelector('[name="mulitiple-checkbox-value"]');

    $checkboxes.forEach((checkbox) => {
      checkbox.addEventListener('change', (event) => {
        const $checked = parent.querySelectorAll(
          'input[type="checkbox"]:checked',
        );
        const values = [...$checked].map((node) => {
          return node.value;
        });

        $hidden.value = values.join(',');
        $hidden.dispatchEvent(new Event('change'));
      });
    });
  });
};
