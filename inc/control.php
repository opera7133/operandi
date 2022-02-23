<?php
class OR_Customize_Multiple_Checkbox_Control extends WP_Customize_Control
{
    public $type = "multiple-checkbox";

    protected function render_content()
    {
        if (empty($this->choices)) {
            return;
        } ?>

    <?php if (!empty($this->label)): ?>
      <span class="customize-control-title"><?php echo esc_html(
          $this->label
      ); ?></span>
    <?php endif; ?>

    <?php if (!empty($this->description)): ?>
      <span class="description customize-control-description"><?php echo esc_html(
          $this->description
      ); ?></span>
    <?php endif; ?>

    <?php $multi_values = !is_array($this->value())
        ? explode(",", $this->value())
        : $this->value(); ?>

    <ul>
      <?php foreach ($this->choices as $value => $label): ?>
      <li>
        <label>
          <input type="checkbox" value="<?php echo $value; ?>" <?php checked(
    in_array($value, $multi_values)
); ?>>
          <?php echo esc_html($label); ?>
        </label>
      </li>
      <?php endforeach; ?>
    </ul>
    <input
      type="hidden"
      name="mulitiple-checkbox-value"
      <?php $this->link(); ?>
      value="<?php echo esc_attr(implode(",", $multi_values)); ?>"
    >
  <?php
    }
}

class OR_Customize_Image_Label_Radio_Control extends WP_Customize_Control
{
    public $type = "image-label-radio";
    public function render_content()
    {
        $input_id = "customize-input-" . $this->id;
        $description_id = "customize-description-" . $this->id;
        $describedby_attr = !empty($this->description)
            ? ' aria-describedby="' . esc_attr($description_id) . '" '
            : "";
        if (empty($this->choices)) {
            return;
        }

        $name = "customize-radio-" . $this->id;
        ?>
      <?php if (!empty($this->label)): ?>
          <span class="customize-control-title"><?php echo esc_html(
              $this->label
          ); ?></span>
      <?php endif; ?>
      <?php if (!empty($this->description)): ?>
          <span id="<?php echo esc_attr(
              $description_id
          ); ?>" class="description customize-control-description"><?php echo $this->description; ?></span>
      <?php endif; ?>

      <?php foreach ($this->choices as $value => $label): ?>
          <span class="customize-inside-control-row">
              <input
                  id="<?php echo esc_attr($input_id . "-radio-" . $value); ?>"
                  type="radio"
                  <?php echo $describedby_attr; ?>
                  value="<?php echo esc_attr($value); ?>"
                  name="<?php echo esc_attr($name); ?>"
                  <?php $this->link(); ?>
                  <?php checked($this->value(), $value); ?>
                  />
              <label for="<?php echo esc_attr(
                  $input_id . "-radio-" . $value
              ); ?>"><img src="<?php echo esc_url_raw($label); ?>" /></label>
          </span>
      <?php endforeach; ?>
      <?php
    }
}

function OR_sanitize_multiple_checkbox($values)
{
    $multi_values = !is_array($values) ? explode(",", $values) : $values;
    return !empty($multi_values)
        ? array_map("sanitize_text_field", $multi_values)
        : [];
}

function customizer_style()
{
    wp_enqueue_style(
        "customizer-style",
        get_template_directory_uri() . "/css/customizer.css"
    );
}
add_action("customize_controls_enqueue_scripts", "customizer_style");
