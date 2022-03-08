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

  registerBlockType("operandi/linkcard", {
    title: "リンクカード",
    icon: {
      foreground: "black",
      src: "embed-photo",
    },
    category: "common",
    attributes: {
      content: {
        type: "string",
        selector: "a",
      },
    },
    supports: {
      customClassName: true,
      className: false,
    },
    edit: function (props) {
      var attributes = props.attributes;

      var content = attributes.content;
      var alignment = attributes.alignment;

      function onChangeContent(newContent) {
        props.setAttributes({ content: newContent });
      }

      return [
        el(
          "div",
          {
            className: "linkcard-wrapper",
          },
          [
            el("p", null, "URLを入力"),
            el(RichText, {
              tagName: "a",
              className: "or-linkcard " + props,
              placeholder: "https://example.com",
              value: content,
              allowedFormats: [],
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
          className: "or-linkcard " + props,
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
