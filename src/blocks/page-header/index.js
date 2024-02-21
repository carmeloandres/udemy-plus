import { registerBlockType } from '@wordpress/blocks'
import { __ } from '@wordpress/i18n'
import block from './block.json'
import { useBlockProps, RichText, InspectorControls } from '@wordpress/block-editor';
import { PanelBody, ToggleControl} from '@wordpress/components'
import icons from '../../icons.js'
import './main.css'

registerBlockType(block.name, {
  icon: icons.primary,
	edit( { attributes,setAttributes } ) {

    const { content, showCategory } = attributes

    const blockProps = useBlockProps();

    return (
      <>
      <InspectorControls>
        <PanelBody title={__('General','udemy-plus')}>
          <ToggleControl
            label={__('Show Category','udemy-plus')}
            checked={showCategory}
            onChange={newVal => setAttributes({ showCategory: newVal })}
            help={ showCategory ?
                  __('The category will be shown','udemy-plus') :
                  __('The custom content will be shown','udemy-plus')
            }
          />
        </PanelBody>
      </InspectorControls>
        <div { ...blockProps }>
          <div className="inner-page-header">
            { showCategory ? 
              
              <h1>{__('Category: Some Category','udemy-plus')}</h1> 
              
              :

              <RichText
                tagName='h1'
                placeholder={__('Heading','udemy-plus')}
                value={content}
                onChange={(newValue) => {setAttributes( { content:newValue } ) } }
              />
            }
          </div>
        </div>
      </>
    );
  }
});
