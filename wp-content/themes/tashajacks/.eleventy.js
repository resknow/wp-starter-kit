module.exports = (eleventyConfig) => {
	// Passthrough Files/Directories
	['src/assets'].forEach((item) => {
		eleventyConfig.addPassthroughCopy(item);
	});

	// BrowserSync Config
	eleventyConfig.setBrowserSyncConfig({
		open: false,
		snippet: false,
	});

	return {
		dir: {
			input: 'src',
			output: 'dist',
		},
	};
};
