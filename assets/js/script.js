$(function () {
    $('#keyboard-pass')
        .keyboard({
            layout: 'international',
            css: {
                // input & preview
                // "label-default" for a darker background
                // "light" for white text
                input: 'form-control input-sm dark',
                // keyboard container
                container: 'center-block well',
                // default state
                buttonDefault: 'btn btn-default',
                // hovered button
                buttonHover: 'btn-primary',
                // Action keys (e.g. Accept, Cancel, Tab, etc);
                // this replaces "actionClass" option
                buttonAction: 'active',
                // used when disabling the decimal button {dec}
                // when a decimal exists in the input area
                buttonDisabled: 'disabled'
            }
        })
        .addTyping();

    $('#keyboard-text')
        .keyboard({

            display: {
                'bksp': '\u2190',
                'enter': 'return',
                'normal': 'ABC',
                'meta1': '.?123',
                'meta2': '#+=',
                'accept': 'Enter'
            },

            layout: 'custom',
            customLayout: {
                'normal': [
                    'q w e r t y u i o p {bksp}',
                    'a s d f g h j k l',
                    'z x c v b n m @ .',
                    '{meta1}  _ - {accept}'
                ],
                'shift': [
                    'Q W E R T Y U I O P {bksp}',
                    'A S D F G H J K L',
                    '{s} Z X C V B N M @ . {s}',
                    '{meta1}  _ - {accept}'
                ],
                'meta1': [
                    '1 2 3 4 5 6 7 8 9 0 {bksp}',
                    '` | { } % ^ * / \'',
                    '{meta2} $ & ~ # = + . {meta2}',
                    '{normal}  ! ? {accept}'
                ],
                'meta2': [
                    '[ ] { } \u2039 \u203a ^ * " , {bksp}',
                    '\\ | / < > $ \u00a3 \u00a5 \u2022',
                    '{meta1} \u20ac & ~ # = + . {meta1}',
                    '{normal}  ! ? {accept}'
                ]
            },
            css: {
                // input & preview
                // "label-default" for a darker background
                // "light" for white text
                input: 'form-control input-sm dark',
                // keyboard container
                container: 'center-block well',
                // default state
                buttonDefault: 'btn btn-default',
                // hovered button
                buttonHover: 'btn-primary',
                // Action keys (e.g. Accept, Cancel, Tab, etc);
                // this replaces "actionClass" option
                buttonAction: 'active',
                // used when disabling the decimal button {dec}
                // when a decimal exists in the input area
                buttonDisabled: 'disabled'
            }
        })
        .addTyping();

    $('#keyboard-pwd')
        .keyboard({

            display: {
                'bksp': '\u2190',
                'enter': 'return',
                'normal': 'ABC',
                'meta1': '.?123',
                'meta2': '#+=',
                'accept': 'Enter'
            },

            layout: 'custom',
            customLayout: {
                'normal': [
                    'q w e r t y u i o p {bksp}',
                    'a s d f g h j k l',
                    'z x c v b n m @ .',
                    '{meta1}  _ - {accept}'
                ],
                'shift': [
                    'Q W E R T Y U I O P {bksp}',
                    'A S D F G H J K L',
                    '{s} Z X C V B N M @ . {s}',
                    '{meta1}  _ - {accept}'
                ],
                'meta1': [
                    '1 2 3 4 5 6 7 8 9 0 {bksp}',
                    '` | { } % ^ * / \'',
                    '{meta2} $ & ~ # = + . {meta2}',
                    '{normal}  ! ? {accept}'
                ],
                'meta2': [
                    '[ ] { } \u2039 \u203a ^ * " , {bksp}',
                    '\\ | / < > $ \u00a3 \u00a5 \u2022',
                    '{meta1} \u20ac & ~ # = + . {meta1}',
                    '{normal}  ! ? {accept}'
                ]
            },
            css: {
                // input & preview
                // "label-default" for a darker background
                // "light" for white text
                input: 'form-control input-sm dark',
                // keyboard container
                container: 'center-block well',
                // default state
                buttonDefault: 'btn btn-default',
                // hovered button
                buttonHover: 'btn-primary',
                // Action keys (e.g. Accept, Cancel, Tab, etc);
                // this replaces "actionClass" option
                buttonAction: 'active',
                // used when disabling the decimal button {dec}
                // when a decimal exists in the input area
                buttonDisabled: 'disabled'
            }
        })
        .addTyping();
});