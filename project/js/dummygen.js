/*
for (var i = 1; i <= 20; i++) {
	let randomBit = Math.round(Math.random());
	let randomBit2 = Math.round(Math.random());
	let randomTopic = Math.ceil(Math.random()*21);
	let randomUser = Math.ceil(Math.random()*2);
	let randomGender = Math.ceil(Math.random()*3);
	let randomDepartment = Math.ceil(Math.random()*6);
	let randomEducation = Math.ceil(Math.random()*10);
	let query = "INSERT INTO registration (userID, departmentID, educationID, conversation_time, registration_time, resident, is_student) VALUES ("+randomUser+", "+randomDepartment+", "+randomEducation+", '23:59:59.9999999', CURRENT_TIMESTAMP, "+randomBit+", "+randomBit2+"); <br>"
	document.getElementById("id").innerHTML += query;
} 


for (var i = 6; i <= 25; i++) {
	let randomGender = Math.ceil(Math.random()*18);
	let query = "INSERT INTO registration_conversation_topic (registrationID, topicID) VALUES ("+i+", "+randomGender+"); <br>"
	document.getElementById("id").innerHTML += query;
}
*/