import { InspectorControls, useBlockProps, InnerBlocks } from '@wordpress/block-editor';
import { createBlock } from '@wordpress/blocks';
import { PanelBody, ToggleControl, FlexBlock, Spinner } from '@wordpress/components';
import { dispatch } from '@wordpress/data';
import { useEffect } from '@wordpress/element';
import { __ } from '@wordpress/i18n';
import BlogrollAppender from './components/blogroll-appender';
import useRecommendations from './use-recommendations';
import useSubscriptions from './use-subscriptions';
import { createBlockFromRecommendation } from './utils';
import './editor.scss';

export function BlogRollEdit( { className, attributes, setAttributes, clientId } ) {
	const {
		show_avatar,
		show_description,
		show_subscribe_button,
		open_links_new_window,
		ignore_user_blogs,
		load_placeholders,
	} = attributes;

	const { isLoading, recommendations } = useRecommendations();
	const { subscriptions } = useSubscriptions( { ignore_user_blogs } );

	const { replaceInnerBlocks } = dispatch( 'core/block-editor' );

	useEffect( () => {
		if ( load_placeholders && recommendations.length ) {
			setAttributes( { load_placeholders: false } );

			const blocks = [
				createBlock( 'core/heading', { content: __( 'Blogroll', 'jetpack' ), level: 3 } ),
				...recommendations.map( createBlockFromRecommendation ),
			];
			replaceInnerBlocks( clientId, blocks );
		}
	}, [ recommendations, load_placeholders, setAttributes, clientId, replaceInnerBlocks ] );

	return (
		<div { ...useBlockProps() } className={ className }>
			<InnerBlocks
				template={ [ [ 'core/heading', { content: __( 'Blogroll', 'jetpack' ), level: 3 } ] ] }
				allowedBlocks={ [ 'jetpack/blogroll-item' ] }
				renderAppender={ () => (
					<BlogrollAppender clientId={ clientId } subscriptions={ subscriptions } />
				) }
			/>

			{ load_placeholders && isLoading && (
				<FlexBlock style={ { padding: '30px', textAlign: 'center' } }>
					<Spinner />
				</FlexBlock>
			) }

			<InspectorControls>
				<PanelBody title={ __( 'Settings', 'jetpack' ) }>
					<ToggleControl
						label={ __( 'Show avatar', 'jetpack' ) }
						checked={ !! show_avatar }
						onChange={ () => setAttributes( { show_avatar: ! show_avatar } ) }
					/>
					<ToggleControl
						label={ __( 'Show description', 'jetpack' ) }
						checked={ !! show_description }
						onChange={ () => setAttributes( { show_description: ! show_description } ) }
					/>
					<ToggleControl
						label={ __( 'Show subscribe button', 'jetpack' ) }
						checked={ !! show_subscribe_button }
						onChange={ () => setAttributes( { show_subscribe_button: ! show_subscribe_button } ) }
					/>
					<ToggleControl
						label={ __( 'Open links in a new window', 'jetpack' ) }
						checked={ !! open_links_new_window }
						onChange={ () => setAttributes( { open_links_new_window: ! open_links_new_window } ) }
					/>
					<ToggleControl
						label={ __( 'Hide my own sites', 'jetpack' ) }
						checked={ !! ignore_user_blogs }
						onChange={ () => setAttributes( { ignore_user_blogs: ! ignore_user_blogs } ) }
					/>
				</PanelBody>
			</InspectorControls>
		</div>
	);
}

export default BlogRollEdit;