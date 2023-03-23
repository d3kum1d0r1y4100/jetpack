import { Container, Text } from '@automattic/jetpack-components';
import { ToggleControl } from '@wordpress/components';
import React from 'react';
import styles from './styles.module.scss';
import { ToggleSectionProps } from './types';

const ToggleSection: React.FC< ToggleSectionProps > = ( {
	title,
	onChange,
	checked,
	disabled,
	children,
} ) => (
	<Container horizontalSpacing={ 7 } horizontalGap={ 3 }>
		<div className={ styles.column }>
			<ToggleControl
				className={ styles.toggle }
				disabled={ disabled }
				checked={ checked }
				onChange={ onChange }
			/>
			<Text className={ styles.title } variant="title-medium">
				{ title }
			</Text>
			{ children }
		</div>
	</Container>
);

export default ToggleSection;
