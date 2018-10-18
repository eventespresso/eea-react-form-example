/**
 * Internal imports
 */
import { loadHandler, submitHandler } from './example-form-handler';
import { withFormHandler } from '../event-espresso-core/assets/src/components/form/base/with-form-handler';
import { FormInput } from '../event-espresso-core/assets/src/components/form/inputs/form-input';
import { InputLabel } from '../event-espresso-core/assets/src/components/form/inputs/base/input-label';
import {
	FormColumn,
	FormRow,
	FormSection,
	FormWrapper,
} from '../event-espresso-core/assets/src/components/form/layouts/two-column-admin/index';
// to switch the form layout and styling,
// you simply have to swap out the above path
// for one of the other layout strategies, like:
// '../components/form/layouts/wp-admin-two-column';
import * as validations from '../event-espresso-core/assets/src/components/form/validations/index';

/**
 * @function
 * @param {Object} submitButton
 * @param {Object} resetButton
 * @param {Object} initialValues
 * @param {Object} currentValues
 * @return {Object} form
 */
const ExampleForm = ( {
	submitButton,
	resetButton,
	initialValues = {},
	currentValues = {},
} ) => {
	// console.log( '*** ExampleForm ***' );
	// console.log( ' > email', currentValues.email );
	// console.log( ' > confirm', currentValues.confirm );
	return (
		<FormWrapper>
			<FormSection>
				{ /*
					FormInputs can be passed directly as children to a
					FormSection component, which will be laid out using
					the FormSection's corresponding AutoFormRow component,
					or for more control over layout,
					FormRows can be passed with as many FormColumn
					component children as is required
				*/ }
				<FormInput
					type="text"
					label="text input"
					name="input1"
					htmlId="input1"
					htmlClass="spoopy-input"
					dataSet={ {
						one: 'one',
						two: 'two',
					} }
					helpTextID="input1-help-text-boop-boop"
					helpText="i am help text"
					initialValue={ initialValues.input1 }
					validations={ validations.required }
				/>
				<FormInput
					type="textarea"
					label="textarea"
					name="input2"
					htmlId="input2"
					htmlClass="biggy-text-input"
					initialValue={ initialValues.input2 }
					validations={ validations.required }
					colSize={ 6 }
				/>
				<FormInput
					type="select"
					label="select input"
					name="select1"
					htmlId="select1"
					options={ [
						{ value: '2', label: '2' },
						{ value: 'two', label: 'two' },
						{ value: 'to', label: 'to' },
						{ value: 'too', label: 'too' },
						{ value: 'deux', label: 'deux' },
					] }
					initialValue={ initialValues.select1 }
					colSize={ 1 }
				/>
				<FormInput
					type="radio"
					label="radio buttons"
					name="radioOne"
					htmlId="radioOne"
					options={ [
						{ value: '1', label: '1' },
						{ value: 'one', label: 'one' },
						{ value: 'won', label: 'won' },
						{ value: 'une', label: 'une' },
						{ value: 'uno', label: 'uno' },
					] }
					initialValue={ initialValues.radioOne }
					validations={ validations.required }
					colSize={ 3 }
				/>
				<FormInput
					type="checkbox"
					label="checkboxes"
					name="check1check2"
					htmlId="check1check2"
					options={ [
						{ value: '2', label: '2' },
						{ value: 'two', label: 'two' },
						{ value: 'to', label: 'to' },
						{ value: 'too', label: 'too' },
						{ value: 'deux', label: 'deux' },
					] }
					initialValue={ initialValues.check1check2 }
					colSize={ 3 }
				/>
				<FormRow>
					<FormColumn align="right">
						<InputLabel
							htmlFor="input3"
							label="too short"
						/>
					</FormColumn>
					<FormColumn>
						<FormInput
							type="text"
							name="input3"
							htmlId="input3"
							initialValue={ initialValues.input3 }
							validations={ validations.minLength( 5 ) }
						/>
					</FormColumn>
					<FormColumn align="right" colSize={ '1h' }>
						<InputLabel
							htmlFor="input4"
							label="too long"
						/>
					</FormColumn>
					<FormColumn>
						<FormInput
							type="text"
							name="input4"
							htmlId="input4"
							initialValue={ initialValues.input4 }
							validations={ [
								validations.required,
								validations.maxLength( 15 ),
							] }
						/>
					</FormColumn>
				</FormRow>
				<FormRow>
					<FormColumn align="right">
						<InputLabel
							htmlFor="input5"
							label="email address"
						/>
					</FormColumn>
					<FormColumn>
						<FormInput
							type="email"
							name="email"
							htmlId="email"
							initialValue={ initialValues.email }
							validations={ validations.required }
							helpText="try: asdf@asdf.asdf"
						/>
					</FormColumn>
					<FormColumn align="right" colSize={ '1h' }>
						<InputLabel
							htmlFor="confirm"
							label="confirm email"
						/>
					</FormColumn>
					<FormColumn>
						<FormInput
							type="text"
							name="confirm"
							htmlId="confirm"
							initialValue={ initialValues.confirm }
							validations={
								validations.matches(
									currentValues.email,
									'email address'
								)
							}
						/>
					</FormColumn>
				</FormRow>
				<FormRow>
					<FormColumn align="right">
						<InputLabel
							htmlFor="number1"
							label="number inputs"
						/>
					</FormColumn>
					<FormColumn colSize={ 1 }>
						<FormInput
							type="number"
							name="number1"
							htmlId="number1"
							initialValue={ initialValues.number1 }
							min={ 1 }
							max={ 10 }
							validations={ [
								validations.minNumber( 1 ),
								validations.maxNumber( 10 ),
							] }
						/>
					</FormColumn>
					<FormColumn colSize={ 1 }>
						<FormInput
							type="text"
							name="number2"
							htmlId="number2"
							initialValue={ initialValues.number2 }
							validations={ validations.isNumeric }
						/>
					</FormColumn>
					<FormColumn colSize={ 1 }>
						<FormInput
							type="text"
							name="number3"
							htmlId="number3"
							initialValue={ initialValues.number3 }
							validations={ validations.isInteger }
						/>
					</FormColumn>
					<FormColumn colSize={ 1 }>
						<FormInput
							type="text"
							name="number4"
							htmlId="number4"
							initialValue={ initialValues.number4 }
							validations={ validations.isFloat }
						/>
					</FormColumn>
				</FormRow>
				<FormRow>
					<FormColumn colSize={ 1 } offset={ 2 }>
						{ submitButton }
					</FormColumn>
					<FormColumn colSize={ 1 }>
						{ resetButton }
					</FormColumn>
				</FormRow>
			</FormSection>
		</FormWrapper>
	);
};

/**
 * ExampleFormHandler
 *
 * @function
 * @return {Object} rendered form
 */
export const ExampleFormHandler = withFormHandler(
	ExampleForm,
	loadHandler,
	submitHandler
);
