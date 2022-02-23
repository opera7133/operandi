(function (
  data,
  lodash,
  blocks,
  editor,
  i18n,
  element,
  hooks,
  components,
  compose
) {
  var el = element.createElement;
  const { assign } = lodash;
  const { __ } = i18n;
  const {
    AlignmentToolbar,
    BlockControls,
    RichText,
    InspectorControls,
    InnerBlocks,
  } = editor;
  const { registerBlockType, Editable, Toolbar } = blocks;

  registerBlockType("operandi/alert", {
    title: "アラート",
    icon: {
      foreground: "black",
      src: "bell",
    },
    category: "common",
    attributes: {
      icon: {
        type: "string",
      },
      content: {
        type: "string",
        selector: "div",
      },
    },
    supports: {
      customClassName: true,
      className: false,
      color: {
        background: true,
        gradients: false,
      },
    },
    edit: function (props) {
      var attributes = props.attributes;
      var icon = attributes.icon ? attributes.icon : "warning";
      var content = attributes.content;
      var alignment = attributes.alignment;

      function onChangeContent(newContent) {
        props.setAttributes({ content: newContent });
      }
      function onChangeIcon(newIcon) {
        console.log(newIcon.target.value);
        props.setAttributes({ icon: newIcon.target.value });
      }

      return [
        el(
          "div",
          {
            className: "alert-editor",
          },
          [
            el(
              InspectorControls,
              { key: "setting" },
              el(
                "div",
                {
                  id: "gutenpride-controls",
                  className: "block-editor-block-card",
                },
                el(
                  "fieldset",
                  null,
                  el(
                    "legend",
                    { className: "blocks-base-control__label" },
                    __("アイコン", "gutenpride")
                  ),
                  el(
                    "select",
                    {
                      onChange: (value) => onChangeIcon(value),
                    },
                    [
                      el(
                        "option",
                        {
                          value: "warning",
                          selected: true,
                        },
                        "warning"
                      ),
                      el(
                        "option",
                        {
                          value: "bell",
                        },
                        "bell"
                      ),
                      el(
                        "option",
                        {
                          value: "flag",
                        },
                        "flag"
                      ),
                      el(
                        "option",
                        {
                          value: "info",
                        },
                        "info"
                      ),
                    ]
                  )
                )
              )
            ),
            el("span", {
              className: "dashicons dashicons-" + icon,
            }),
            el(RichText, {
              tagName: "p",
              className: "alert-text " + props,
              placeholder: "テキストを追加",
              value: content,
              allowedFormats: [
                "core/bold",
                "core/italic",
                "core/link",
                "core/underline",
                "core/strikethrough",
                "core/subscript",
                "core/superscript",
              ],
              onChange: onChangeContent,
            }),
          ]
        ),
      ];
    },
    save: function (props) {
      var attributes = props.attributes;
      var content = attributes.content;

      return [
        el(RichText.Content, {
          tagName: "a",
          className: "alert " + props,
          value: content,
        }),
      ];
    },
  });
})(
  window.wp.data,
  window.lodash,
  window.wp.blocks,
  window.wp.editor,
  window.wp.i18n,
  window.wp.element,
  window.wp.hooks,
  window.wp.components,
  window.wp.compose
);
