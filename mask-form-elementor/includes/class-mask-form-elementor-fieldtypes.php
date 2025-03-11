<?php
namespace Mask_Form_Elementor;

defined( 'ABSPATH' ) || die( 'The silence is god!' );

class Mask_Form_Elementor_FieldTypes {

    /**
     * Get the custom field types.
     *
     * @return array
     */
    public function get_field_types() {
        return [
            'maskdate'               => __( 'Máscara: Data', 'mask-form-elementor' ),
            'masktime'               => __( 'Máscara: Horário', 'mask-form-elementor' ),
            'maskdate_time'          => __( 'Máscara: Data e Horário', 'mask-form-elementor' ),
            'maskcep'                => __( 'Máscara: CEP', 'mask-form-elementor' ),
            'maskphone'              => __( 'Máscara: Telefone sem DDD', 'mask-form-elementor' ),
            'masktelephone_with_ddd' => __( 'Máscara: Telefone', 'mask-form-elementor' ),
            'maskphone_with_ddd'     => __( 'Máscara: Telefone com nono digito', 'mask-form-elementor' ),
            'maskcpfcnpj'            => __( 'Máscara: Cpf ou Cnpj', 'mask-form-elementor' ),
            'maskcpf'                => __( 'Máscara: CPF', 'mask-form-elementor' ),
            'maskcnpj'               => __( 'Máscara: CNPJ', 'mask-form-elementor' ),
            'maskmoney'              => __( 'Máscara: Monetário', 'mask-form-elementor' ),
            'maskip_address'         => __( 'Máscara: Endereço de IP', 'mask-form-elementor' ),
            'maskpercent'            => __( 'Máscara: Porcentagem', 'mask-form-elementor' ),
            'maskcard_number'        => __( 'Máscara: Número Cartão de Crédito', 'mask-form-elementor' ),
            'maskcard_date'          => __( 'Máscara: Validade Cartão de Crédito', 'mask-form-elementor' ),
        ];
    }

    public function get_all_form_widget_ids( array $elements ) {
        $widget_ids = [];
        foreach ( $elements as $element ) {
            if (
                isset( $element['elType'], $element['widgetType'] ) &&
                $element['elType'] === 'widget' &&
                $element['widgetType'] === 'form'
            ) {
                $widget_ids[] = $element['id'];
            }
            if ( isset( $element['elements'] ) && is_array( $element['elements'] ) && ! empty( $element['elements'] ) ) {
                $widget_ids = array_merge( $widget_ids, $this->get_all_form_widget_ids( $element['elements'] ) );
            }
        }
        return array_unique( $widget_ids );
    }


    // public function get_all_form_widget_ids( array $elements ) {
    //     $widget_ids = [];
    //     // Get the keys for the custom field types.
    //     $custom_field_types = array_keys( $this->get_field_types() );
    
    //     foreach ( $elements as $element ) {
    //         // Check if the element is a form widget.
    //         if (
    //             isset( $element['elType'], $element['widgetType'] ) &&
    //             $element['elType'] === 'widget' &&
    //             $element['widgetType'] === 'form'
    //         ) {
    //             // Check if the widget has form fields.
    //             if ( isset( $element['settings']['form_fields'] ) && is_array( $element['settings']['form_fields'] ) ) {
    //                 foreach ( $element['settings']['form_fields'] as $field ) {
    //                     if ( isset( $field['field_type'] ) && in_array( $field['field_type'], $custom_field_types, true ) ) {
    //                         $widget_ids[] = $element['id'];
    //                         // Found at least one matching field, so we add the widget ID and break out of the inner loop.
    //                         break;
    //                     }
    //                 }
    //             }
    //         }
    //         // Recursively check nested elements.
    //         if ( isset( $element['elements'] ) && is_array( $element['elements'] ) && ! empty( $element['elements'] ) ) {
    //             $widget_ids = array_merge( $widget_ids, $this->get_all_form_widget_ids( $element['elements'] ) );
    //         }
    //     }
    //     return array_unique( $widget_ids );
    // }
    /**
     * Add custom field types to Elementor Pro.
     *
     * @param array $types Existing field types.
     * @return array
     */
    public function add_field_types( $types ) {
        return array_merge( $types, $this->get_field_types() );
    }    

    /**
     * Render the custom field.
     *
     * @param array  $item       Field settings.
     * @param int    $item_index Field index.
     * @param object $el         Elementor form widget instance.
     */
    public function render_field( $item, $item_index, $el ) {
        // Remove the "mask" prefix to generate a CSS class.
        $mask_class = substr( $item['field_type'], 4 );

        $el->set_render_attribute( 'input' . $item_index, 'type', 'tel' );
        $el->add_render_attribute( 'input' . $item_index, 'class', 'elementor-field-textual ' . $mask_class );

        if ( ! empty( $item['field_label'] ) ) {
            $el->add_render_attribute( 'input' . $item_index, 'placeholder', $item['field_label'] );
        }

        echo '<input size="1" ' . $el->get_render_attribute_string( 'input' . $item_index ) . '>';
    }
}
