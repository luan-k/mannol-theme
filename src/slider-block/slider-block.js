import { __ } from "@wordpress/i18n";
import { MediaUpload, MediaUploadCheck } from "@wordpress/block-editor";
import { Button, IconButton } from "@wordpress/components";
import { getBlockType } from "@wordpress/blocks";

if (!wp.blocks.getBlockType("wkode/custom-slider-block")) {
  wp.blocks.registerBlockType("wkode/custom-slider-block", {
    title: __("Custom Slider", "wkode"),
    icon: "images-alt",
    category: "media",
    attributes: {
      images: {
        type: "array",
        default: [],
      },
    },
    edit: (props) => {
      const { attributes, setAttributes } = props;

      const updateImage = (index, media) => {
        const updatedImages = [...attributes.images];
        updatedImages[index] = media;
        setAttributes({ images: updatedImages });
      };

      const addImage = () => {
        setAttributes({ images: [...attributes.images, null] });
      };

      const removeImage = (index) => {
        const updatedImages = attributes.images.filter((_, i) => i !== index);
        setAttributes({ images: updatedImages });
      };

      return (
        <div>
          {attributes.images.map((image, index) => (
            <div key={index} style={{ display: "flex", alignItems: "center" }}>
              {image && image.url ? (
                <img
                  src={image.url}
                  alt='Selected Image'
                  style={{ width: "50px", height: "50px", marginRight: "10px" }}
                />
              ) : null}
              <MediaUploadCheck>
                <MediaUpload
                  onSelect={(media) => updateImage(index, media)}
                  allowedTypes={["image"]}
                  render={({ open }) => (
                    <Button onClick={open} isSecondary>
                      {image && image.url
                        ? __("Change Image", "wkode")
                        : __("Select Image", "wkode")}
                    </Button>
                  )}
                />
              </MediaUploadCheck>
              <IconButton
                icon='trash'
                label='Remove'
                onClick={() => removeImage(index)}
                isDestructive
              />
            </div>
          ))}
          <Button onClick={addImage} isPrimary>
            {__("Add Image", "wkode")}
          </Button>
        </div>
      );
    },
    save: () => {
      return null;
    },
  });
}
