<?php

	/* ********************************************************
	 * ********************************************************
	 * ********************************************************/
	class UserBirthdayCalendarViewView extends ProjectAbstractView {

        /* ********************************************************
         * ********************************************************
         * ********************************************************/
        public function displayContent() {
			?>
                <h1>
                    <?php print(RequestHelper::$actor_class_name); ?>
                    <?php print(RequestHelper::$actor_action); ?>
                </h1>

                <div class="calendar" id="calendar"></div>

                <script>
                    // Pass the PHP grouped birthday data to JavaScript
                    const birthdays = <?php 
                        print(
                            json_encode(
                                DatetimeHelper::groupUserDOsByMonth($this->do->do_list)
                            )
                        ); 
                    ?>;

                    const calendarElement = document.getElementById('calendar');

                    for (const month in birthdays) {
                        const monthDiv = document.createElement('div');
                        monthDiv.classList.add('month');

                        const monthHeader = document.createElement('h2');
                        monthHeader.textContent = month;
                        monthDiv.appendChild(monthHeader);

                        birthdays[month].forEach(user => {
                            const userDiv = document.createElement('div');
                            userDiv.classList.add('user');
                            userDiv.innerHTML = `
                                <span>${user.name}</span><br>
                                <!-- <small>Email: ${user.email}</small><br>
                                <small>Phone: ${user.phone}</small><br>
                                <small>Birthday: ${user.birthday_at}</small> -->
                            `;
                            monthDiv.appendChild(userDiv);
                        });

                        calendarElement.appendChild(monthDiv);
                    }
                </script>
			<?php
		}

    }

?>