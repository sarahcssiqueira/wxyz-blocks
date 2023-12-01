import { __ } from "@wordpress/i18n";
import { useBlockProps } from "@wordpress/block-editor";

function Save(props) {
  return (
    <p {...useBlockProps.save()}>
      {__(<div>{props.attributes.exampleAttribute}</div>)}
    </p>
  );
}

export default Save;
