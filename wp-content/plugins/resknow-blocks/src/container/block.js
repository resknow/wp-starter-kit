import { InnerBlocks, InspectorControls } from "@wordpress/block-editor";
import { Panel, PanelBody, SelectControl } from "@wordpress/components";
import { registerBlockType } from "@wordpress/blocks";

import "./editor.css";
import "./style.css";

registerBlockType("resknow/container", {
	title: "Container",
	icon: {
		src: (
			<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
				<path d="M20.49,7.52a.19.19,0,0,1,0-.08.17.17,0,0,1,0-.07l0-.09-.06-.15,0,0h0l0,0,0,0a.48.48,0,0,0-.09-.11l-.09-.08h0l-.05,0,0,0L16.26,4.45h0l-3.72-2.3A.85.85,0,0,0,12.25,2h-.08a.82.82,0,0,0-.27,0h-.1a1.13,1.13,0,0,0-.33.13L4,6.78l-.09.07-.09.08L3.72,7l-.05.06,0,0-.06.15,0,.09v.06a.69.69,0,0,0,0,.2v8.73a1,1,0,0,0,.47.85l7.5,4.64h0l0,0,.15.06.08,0a.86.86,0,0,0,.52,0l.08,0,.15-.06,0,0h0L20,17.21a1,1,0,0,0,.47-.85V7.63S20.49,7.56,20.49,7.52ZM12,4.17l1.78,1.1L8.19,8.73,6.4,7.63Zm-1,15L5.5,15.81V9.42l5.5,3.4Zm1-8.11L10.09,9.91l5.59-3.47L17.6,7.63Zm6.5,4.72L13,19.2V12.82l5.5-3.4Z" />
			</svg>
		),
		foreground: "#00c6ae",
	},
	category: "layout",
	keywords: ["container", "box"],
	attributes: {
		align: {
			type: "string",
			default: "full",
		},
		padding: {
			type: "number",
			default: 0,
		},
	},
	supports: {
		anchor: true,
		align: ["wide", "full"],
		color: {
			background: true,
		},
	},
	edit: ({ attributes, setAttributes, className }) => {
		return [
			<InspectorControls>
				<Panel>
					<PanelBody title="Spacing">
						<SelectControl
							label="Padding"
							help="Adds space above and below the content of this container"
							onChange={(value) => {
								setAttributes({ padding: value });
							}}
							value={attributes.padding}
							options={[
								{ label: "None", value: 0 },
								{ label: "Small", value: 4 },
								{ label: "Medium", value: 8 },
								{ label: "Large", value: 12 },
								{ label: "Extra Large", value: 16 },
								{ label: "2XL", value: 24 },
							]}
						/>
					</PanelBody>
				</Panel>
			</InspectorControls>,
			<div className={[className, `py-${attributes.padding}`].join(" ")}>
				<InnerBlocks />
			</div>,
		];
	},
	save: ({ attributes, className }) => {
		return (
			<div className={className}>
				<div className="block-area">
					<InnerBlocks.Content />
				</div>
			</div>
		);
	},
});
