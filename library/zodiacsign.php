<?php
	/*
		Script:		zodiacsign.php
		Author:		Prithu Ahmed
		Purpose:	Sunsign related functions
		Date:		Last updated 01-21-12
		Note:		
	*/
	
	function ZodiacSign($Date, $Debug=false){
	DebugFunctionTrace($FunctionName="ZodiacSign", $Parameter=array("Date"=>$Date, "Debug"=>$Debug), $UseURLDebugFlag=true);

		if($Date==""||$Date=="0000-00-00")$Date=date("Y-m-d");

	    $Day=substr($Date, 8, 2);
	    $Month=substr($Date, 5, 2);
//	    $Day=date("j", strtotime($Date));
//	    $Month=date("n", strtotime($Date));
	    
	    switch($Month){
	        case 1:if($Day<=21){$Sign="Capricorn";}else{$Sign="Aquarius";}break;
	        case 2:if($Day<=19){$Sign="Aquarius";}else{$Sign="Pisces";}break;
	        case 3:if($Day<=20){$Sign="Pisces";}else{$Sign="Aries";}break;
	        case 4:if($Day<=21){$Sign="Aries";}else{$Sign="Taurus";}break;
	        case 5:if($Day<=20){$Sign="Taurus";}else{$Sign="Gemini";}break;
	        case 6:if($Day<=21){$Sign="Gemini";}else{$Sign="Cancer";}break;
	        case 7:if($Day<=22){$Sign="Cancer";}else{$Sign="Leo";}break;
	        case 8:if($Day<=23){$Sign="Leo";}else{$Sign="Virgo";}break;
	        case 9:if($Day<=23){$Sign="Virgo";}else{$Sign="Libra";}break;
	        case 10:if($Day<=23){$Sign="Libra";}else{$Sign="Scorpio";}break;
	        case 11:if($Day<=22){$Sign="Scorpio";}else{$Sign="Sagittarius";}break;
	        case 12:if($Day<=21){$Sign="Sagittarius";}else{$Sign="Capricorn";}break;
		}

	    if($Debug){
			print "
				<div style=\"background-color: yellow; border-style: solid; border-width: 2px; border-color: red;\">
				    function SunSign(\$Date = '$Date', \$Debug=$Debug){<br>
				        <b>\$Day</b> = $Day<br>
				        <b>\$Month</b> = $Month<br>
				        <b>\$Sign</b> = $Sign<br>
					}
				</div>
			";
		}
	    
	    return $Sign;
	}
	
	function ZodiacSignSummary($ZodiacSign){
	    switch($ZodiacSign){
	        case"Capricorn":$Summary="Capricorn, the tenth Sign of the Zodiac, is all about hard work. Those born under this Sign are more than happy to put in a full day at the office, realising that it takes a lot of those days to reach the top. That's no problem, since Capricorns are both ambitious and determined - they will get there. Life is one big project for these people, and they adapt to this by adopting a businesslike approach to everything they do. Capricorns are practical, taking things one-step at a time and being as realistic and pragmatic as possible. The Capricorn-born are extremely dedicated to their goals, almost to the point of stubbornness.The Goat is the Capricorn symbol, and an apt mascot for these people. Goats love to climb to the top of the mountain, where the air is clear and fresh. In much the same way, Capricorns want to get to the top of their chosen field so that they can reap the benefits of success; namely fame, prestige and money. Getting to the top is not always easy, however, so it's likely that Goats will ruffle a few feathers along the way.";break;
	        case"Aquarius":$Summary="Aquarius is the eleventh Sign of the Zodiac, and Aquarians are the perfect representatives for the Age of Aquarius. Those born under this Sign have the social conscience needed to carry us into the new millennium. These people are humanitarian, philanthropic and keenly interested in making the world a better place. This is why they focus much of their energy on our social institutions and how they work (or don't work). Aquarians are visionaries, progressive souls who love to spend time thinking about how to improve the world around them. They are also quick to engage others in this process, which is why they have so many friends and acquaintances. Making the world a better place is a collaborative effort for Aquarians.";break;
	        case"Pisces":$Summary="Pisces are the most intuitive of all the zodiac. They are so empathic that they often take on other's pain to the detriment of their own health. Giving to a point of martyrdom is a major problem for these kind souls. Unselfish to a fault. No wonder they make the best nurses. They can easily be confused. Taken up by every whim, they cannot get much done. Very spiritually evolved and best when living in a world of creativity. Sensitive to drugs and alcohol. Where you find a body of water, you will always find at least one pisces. Often the ship captain or life guard. Once they start on the road to obsessions, they have more trouble than anyone else coming back to this world. Play music for them and they will calm down. Mediation and day dreaming will help them fit in the world.";break;
	        case"Aries":$Summary="Aries is the sign of the natural born leader. Always impulsive, spontaneous and headstrong. Never malicious, though often self-centered. An Aries is fearless and brave almost to a point of foolishness definitely making their actions and presence known.";break;
	        case"Taurus":$Summary="Manages to possess, and \"have\" just about everything possible. Very gentle, steadfast, stubborn and at times, slow. They plod through life making other's dreams come true by taking other's projects and making them shine. Down to earth with a no-nonsense approach, saying what they mean with a very strong sense of values. You will find nothing cheap or shoddy about them or what they own. Waiting until they can afford only the best, including fine food and wine. Often artistic and sometimes very musical since they are ruled by the throat.";break;
	        case"Gemini":$Summary="Gemini is the third Sign of the Zodiac, and those born under this Sign will be quick to tell you all about it. This is because they love to talk. It's not just idle chatter with these people, either. The driving force behind a Gemini's conversation is their mind. The Gemini-born are intellectually inclined, forever probing for more and more information. The more information a Gemini collects, the better. Sharing that knowledge later on with those they love is also a lot of fun, for Geminis are supremely interested in developing their relationships. Contact with these people is always enjoyable - Geminis are bright, quick-witted and the proverbial life of the party. Even though their intellectual minds can rationalise forever and a day, Geminis also have a surplus of imagination waiting to be tapped.";break;
	        case"Cancer":$Summary="Cancer, the fourth Sign of the Zodiac, is all about the home. Those born under this Sign like to stick to their roots, they take great pleasure in the comforts of home and family. Cancers are maternal, domestic, and love to nurture others. More than likely, their family will be large. Cancerians are at their best when their home life is serene and harmonious. Traditions are upheld with great enthusiasm in a Cancerian's household, since these people prize family history and love communal activities. They also tend to be patriotic, waving the flag, whenever possible.";break;
	        case"Leo":$Summary="Look for the royal label on everything Leos do and say. For they are truly the Kings of the zodiac. Nothing modest about Leo. If you do not complement them, they will tell you what you should complement them on. Very proud and self-confident. They will not even start a project unless they think they will come out on top when it is finished. Generous, affectionate, charismatic and often theatrical in their behavior. Do not hurt their pride or they will argue with you until you give them something they can walk away with that boosts their egos. Give them the sunshine to make them the happiest. If you come home and all the lights are on, you know you have a Leo in the house. Give them mirrors and a Kingly chair and they will be content. Like the heart they are ruled by, they are generous often to a fault.";break;
	        case"Virgo":$Summary="Here you will find our worker bees. Virgo is the original server. Precise and methodical like no other sign of the zodiac. No detail gets by them. They can miss the big picture being lost in the details. Perfectionism can often lead to picky and critical words. Want to hire the best employee you will ever have? Choose a Virgo. They often do not like to delegate and want to oversee every step of the operation themselves. Always worrying and fussing about others. You will find many Virgos surrounded by pets for who needs them more than the family pet. If Virgo focuses too much on others, they can be prone to illness.";break;
	        case"Libra":$Summary="Here is Libra, the a number one charmer of the zodiac. They are more diplomatic than any other sign. They hate uncouth behavior. Always looking for balance, yet rarely finding it. They so please others, they cannot make up their minds. For everything looks good to them. They can spend hours debating each side of an argument. Often you will see them as lawyers for just this reason. The most artistic of all the signs. They can do so many things artistically that they cannot find which one to do. Want to know what is in fashion? Ask a Libra, for they always know just how to decorate their bodies in ways that make them look truly beautiful. Libra's need to be popular often gets them in trouble. They may say what they think you want to hear, truth or not, just so you will like them. Impersonal and impartial, this sign gives out only what is demanded, never overdoing things.";break;
	        case"Scorpio":$Summary="Scorpio is the deepest and most intense of any of the signs. Never concerned with the superficial. Often this gives them great power They can see into people with their immense intuition. Very passionate in everything they do. Often thought of as the sexual sign. Scorpio carries this intensity into everything they do. Scorpio can inspire fear or awe in others because of their often overwhelming ability to strip away all veneer to get to the bottom line. Not afraid of endings or new beginnings. A loyal friend but a fanatic foe. They invented the word \"revenge.\"";break;
	        case"Sagittarius":$Summary="Do not think you can have a good party without a at least one Sagittarius. They will liven up any party. Usually the first to arrive and the last to leave. Their favorite word is *fun* Anywhere they hang their hat is home. They can be comfortable anywhere. They are the travelers of the zodiac. Not content to see the sights, they want to know about the culture and people of each country they visit. Often they will live in another country than the one they were born in. A seeker of knowledge and wisdom. Optimistic and easy-going. They have a strong sense of justice and truth. They do lack a bit of tact, direct and to the point. They often open their mouths to change feet. In a relationship they are often as carefree as they are in the rest of their lives. Being a free spirit, and answering to no one, they often look for the new adventures to tackle and travel from relationship to relationship as often as they travel from country to country.";break;
		}
		
		return $Summary;
	}
	
	function ZodiacAce($ZodiacSign){
	    switch($ZodiacSign){
	        case"Capricorn":$Ace="Earth";break;
	        case"Aquarius":$Ace="Air";break;
	        case"Pisces":$Ace="Water";break;
	        case"Aries":$Ace="Fire";break;
	        case"Taurus":$Ace="Earth";break;
	        case"Gemini":$Ace="Air";break;
	        case"Cancer":$Ace="Water";break;
	        case"Leo":$Ace="Fire";break;
	        case"Virgo":$Ace="Earth";break;
	        case"Libra":$Ace="Air";break;
	        case"Scorpio":$Ace="Water";break;
	        case"Sagittarius":$Ace="Fire";break;
		}

		return $Ace;
	}
?>
