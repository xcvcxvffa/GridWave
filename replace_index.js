const fs = require('fs');
let content = fs.readFileSync('index.php', 'utf8');

// General Lorem Ipsum replacements
content = content.replace(/It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout\. The point of using Lorem Ipsum is that it has a more-or-less/g, "We leverage industry-leading practices and innovative technologies to deliver robust, high-performance energy solutions tailored to our clients' specific needs.");

content = content.replace(/It is a long established fact that a reader will be distracted by the readable content of a page\s*when looking at its layout\. The point of using Lorem Ipsum is that it/g, 'GridWave Energy employs a systematic, end-to-end project management methodology to ensure that every stage of the project is executed with precision, compliance, and excellence.');

content = content.replace(/page when looking at its layout\. The point of using Lorem Ipsum is that it has a/g, 'project phase to ensure the highest standards of safety, quality, and operational efficiency are maintained.');

content = content.replace(/of a page when looking at its layout\. The point of using Lorem Ipsum is that it has a more-or-less/g, 'We ensure that every infrastructure project we undertake meets the highest standards of operational excellence and sustainability.');

content = content.replace(/looking at its layout\. The point of using Lorem Ipsum is that it has a more-or-less/g, "We leverage industry-leading practices and innovative technologies to deliver robust, high-performance energy solutions tailored to our clients' specific needs.");

// Also replace the rest of stray "readable content" that wasn't matched above
content = content.replace(/It is a long established fact that a reader will be distracted by the readable\s*content of a/g, 'Discover the latest trends, technologies, and strategies driving efficiency and sustainability in the renewable sector.');
content = content.replace(/It is a long established fact that a reader will be distracted by the readable\s*/g, 'Delivering exceptional engineering and execution with a focus on long-term performance.');

fs.writeFileSync('index.php', content, 'utf8');
console.log('Cleanup replacements completed successfully.');
