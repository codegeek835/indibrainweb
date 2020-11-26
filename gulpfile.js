const { src, dest, task, watch, series, parallel } = require("gulp");
const sass = require("gulp-sass");
const browserSync = require("browser-sync").create();
// const runSequence = require("run-sequence");
const uglify = require("gulp-uglify");
const cleanCSS = require("gulp-clean-css");
const sourcemaps = require("gulp-sourcemaps");
const imagemin = require("gulp-imagemin");
const cache = require("gulp-cache");
const del = require("del");
const autoprefixer = require("gulp-autoprefixer");
const rename = require("gulp-rename");
const runSequence = require("gulp4-run-sequence");
// ... variables
const autoprefixerOptions = {
	browsers: ["last 2 versions", "> 5%", "Firefox ESR"],
};
const sassOptions = {
	errLogToConsole: true,
	outputStyle: "compressed",
};
const sourceDir = "assets/front/src";
const destinationDir = "assets/front";

// Optimizing Javascript
task("optimizingJS", () => {
	console.log("optimizingJS");
	return src(`${sourceDir}/js/*.js`)
		.pipe(sourcemaps.init())
		.pipe(uglify())
		.pipe(rename({ extname: ".min.js" }))
		.pipe(
			sourcemaps.write("./", {
				includeContent: false,
				sourceRoot: `${sourceDir}/js`,
			})
		)
		.pipe(dest(`${destinationDir}/js`))
		.pipe(browserSync.stream({ match: "**/*.js" }));
});

// Optimizing CSS
task("optimizingCSS", () => {
	console.log("optimizingCSS");
	return src(`${sourceDir}/css/*.css`)
		.pipe(sourcemaps.init())
		.pipe(cleanCSS({ level: { 1: { specialComments: 0 } } }))
		.pipe(autoprefixer(autoprefixerOptions))
		.pipe(
			sourcemaps.write("./", {
				includeContent: false,
				sourceRoot: `${sourceDir}/css`,
			})
		)
		.pipe(dest(`${destinationDir}/css`))
		.pipe(browserSync.stream({ match: "**/*.css" }));
});

// Compile SCC to CSS
task("sass", () => {
	console.log("sass");
	return src(`${sourceDir}/scss/*.scss`)
		.pipe(sourcemaps.init())
		.pipe(sass(sassOptions).on("error", sass.logError))
		.pipe(autoprefixer(autoprefixerOptions))
		.pipe(
			sourcemaps.write("./", {
				includeContent: false,
				sourceRoot: `${sourceDir}/css`,
			})
		)
		.pipe(dest(`${destinationDir}/css`))
		.pipe(browserSync.stream({ match: "**/*.css" }));
});

task("preFixer", () => {
	return pipe(autoprefixer(autoprefixerOptions))
		.pipe(
			sourcemaps.write("./", {
				includeContent: false,
				sourceRoot: `${sourceDir}/css`,
			})
		)
		.pipe(dest(`${destinationDir}/css`))
		.pipe(browserSync.stream({ match: "**/*.css" }));
});

// Optimizing Images
task("images", () => {
	console.log("images");
	return (
		src(`${sourceDir}/images/*`)
			// Caching images that ran through imagemin
			.pipe(
				cache(
					imagemin({
						interlaced: true,
						progressive: true,
						optimizationLevel: 5,
						svgoPlugins: [
							{
								removeViewBox: true,
							},
						],
					})
				)
			)
			.pipe(dest(`${destinationDir}/images`))
	);
});

// Optimizing Images
task("profile", () => {
	console.log("profile");
	return (
		src(`${sourceDir}/profile/*`)
			// Caching images that ran through imagemin
			.pipe(
				cache(
					imagemin({
						interlaced: true,
						progressive: true,
						optimizationLevel: 5,
						svgoPlugins: [
							{
								removeViewBox: true,
							},
						],
					})
				)
			)
			.pipe(dest(`${destinationDir}/profile`))
	);
});

// Optimizing Images
task(
	"imagemin",
	series("images", "profile", (cb) => {
		cb();
	})
);

// Copying Fonts to Dist
task("fonts", () => {
	console.log("fonts");
	return src(`${sourceDir}/fonts/**/*`).pipe(dest(`${destinationDir}/fonts`));
});

// Cleaning up generated files automatically
task("clean", (cb) => {
	console.log("clean");
	return del.sync([`${destinationDir}/**`, `!${sourceDir}`], cb());
});

// Reload browser
task("browserSync", () => {
	browserSync.init({
		server: {
			baseDir: ".",
		},
	});
});

// Watch Task
task("watch", () => {
	console.log("gulp is watching");
	watch(`${sourceDir}/js/*.js`, series("optimizingJS"));
	watch(`${sourceDir}/css/*.css`, series("optimizingCSS"));
	watch(`${sourceDir}/scss/*.scss`, series("sass"));
	watch(`${sourceDir}`, series("browserSync"));
});

// Optimizing Images
task(
	"build",
	series(
		"clean",
		"optimizingJS",
		"sass",
		"optimizingCSS",
		"fonts",
		"imagemin",
		(done) => {
			done();
		}
	)
);
