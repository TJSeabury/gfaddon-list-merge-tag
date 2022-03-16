<?php namespace tjseabury\gfaddon\lmt;

use function \add_filter;
use function \add_action;
use \GFCommon;
use \GFForms;
use function \rgars;
use function \rgar;

GFForms::include_addon_framework();

class ListMergeTag extends GFAddOnAbstractSingleton {

    protected $_version = GFAddOn_ListMergeTag_VERSION;
    protected $_min_gravityforms_version = '1.9';
    protected $_slug = 'GFAddOn_ListMergeTag';
    protected $_path = 'gfaddon-list-merge-tag/ListMergeTag.php';
    protected $_full_path = __FILE__;
    protected $_title = 'Gravity Forms Add-On List Merge Tag';
    protected $_short_title = 'List Merge Tag';

    /**
     * Handles hooks and loading of language files.
     */
    public function init() {
        parent::init();
        add_filter( 'gform_custom_merge_tags', [ $this, 'add_list_column_merge_tag' ], 10, 4 );
        add_filter( 'gform_merge_tag_filter', [ $this, 'replace_list_column_merge_tag' ], 10, 5 );
    }


    public function add_list_column_merge_tag( $merge_tags, $form_id, $fields, $element_id ) {
        foreach ( $fields as $field ) {
            if ( $field->get_input_type() === 'list' ) {
                if ( is_array( $field->choices ) ) {
                    foreach( $field->choices as $key => $choice ){
                        ++$key; // add 1 as the choices array is zero based
                        $merge_tags[] = array(
                            'label' => "{$field->label} - {$choice['text']}",
                            'tag' => "{{$field->label}:{$field->id}:{$key}}"
                        );
                    }
                } else {
                    $merge_tags[] = array(
                        'label' => "{$field->label}",
                        'tag' => "{{$field->label}:{$field->id}:1}"
                    );
                }
            }
        }
        return $merge_tags;
    }

    public function replace_list_column_merge_tag( $value, $merge_tag, $modifier, $field, $raw_value ) {
        if ( $field->get_input_type() == 'list' && $merge_tag != 'all_fields' && ! empty( $modifier ) ) {

            $column_values = array();

            // count the actual number of columns
            $choices = $field->choices;
            $column_count = count( $choices );

            if ( $column_count > 1 ) {
                // subtract 1 from column number as the choices array is zero based
                $column_num = $modifier - 1;

                // get the column label so we can use that as the key to the multi-column values
                $column = rgars( $choices, "{$column_num}/text" );

                // get the list fields values from the $entry
                $values = unserialize( $raw_value );

                foreach ( $values as $value ) {
                    $column_values[] = rgar( $value, $column );
                }

                $value = GFCommon::implode_non_blank( ', ', $column_values );
            } else {
                // get the list fields values from the $entry
                $values = unserialize( $raw_value );

                foreach ( $values as $value ) {
                    $column_values[] = $value;
                }

                $value = GFCommon::implode_non_blank( ', ', $column_values );
            }
        }

        return $value;
    }

}
