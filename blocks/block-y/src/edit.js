import React from "react";
import { __ } from "@wordpress/i18n";
import { useBlockProps } from "@wordpress/block-editor";

function Edit(props) {
  function setExampleAttribute(e) {
    props.setAttributes({ exampleAttribute: e.target.value });
  }

  return (
    <div {...useBlockProps()}>
      <div>
        <h4>Block Y</h4>
        <p>Insert the attribute value below</p>
        <input
          type="text"
          value={props.attributes.exampleAttribute}
          onChange={setExampleAttribute}
          placeholder="Attribute value that will be displayed in the frontend"
        />
      </div>
    </div>
  );
}

export default Edit;
