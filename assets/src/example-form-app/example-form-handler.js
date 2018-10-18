// normally the form data would come from the server
const initialValues = {
	input1: 'qwerty',
	input2: 'The <textarea> tag defines a multi-line text input control. A text area can hold an unlimited number of characters, and the text renders in a fixed-width font (usually Courier). The size of a text area can be specified by the cols and rows attributes, or even better; through CSS\' height and width properties.',
	select1: 'two',
	radioOne: 'one',
	check1check2: [ 'two', 'too' ],
	input3: 'hi there',
	input4: 'short value',
	email: 'asdf@asdf.asdf',
	confirm: 'asdf@asdf.asdf',
	number1: 1,
	number2: 1.20,
	number3: 1.0,
	number4: 1.20,
};

/**
 * @function
 * @return {Object} data
 */
export const loadHandler = async () => {
	await new Promise( resolve => setTimeout( resolve, 2000 ) );
	return initialValues;
};

/**
 * @function example-submit-handler
 * @param {Object} data
 */
export const submitHandler = async data => {
	await new Promise( resolve => setTimeout( resolve, 4000 ) );
	window.alert( JSON.stringify( data, 0, 2 ) );
};
