<?php

	/* ********************************************************
	 * ********************************************************
	 * ********************************************************/
	class KnowledgeCenterDigitalLogicViewView extends ProjectAbstractView {

        /* ********************************************************
         * ********************************************************
         * ********************************************************/
        public function displayContent() {
			?>

                <style>
                    /* Styling the 7-segment display */
                    .seven-segment {
                        display: flex;
                        flex-direction: column;
                        align-items: center;
                        justify-content: center;
                        width: 120px;
                        height: 200px;
                        background-color: black;
                        position: relative;
                        margin: 20px auto;
                    }

                    .segment {
                        position: absolute;
                        background-color: grey;
                        border-radius: 5px;
                    }

                    .segment.on {
                        background-color: red;
                    }

                    /* Segment positioning */
                    .segment.a { top: 10px; left: 20px; width: 80px; height: 15px; }
                    .segment.b { top: 25px; right: 10px; width: 15px; height: 70px; }
                    .segment.c { bottom: 25px; right: 10px; width: 15px; height: 70px; }
                    .segment.d { bottom: 10px; left: 20px; width: 80px; height: 15px; }
                    .segment.e { bottom: 25px; left: 10px; width: 15px; height: 70px; }
                    .segment.f { top: 25px; left: 10px; width: 15px; height: 70px; }
                    .segment.g { top: 90px; left: 20px; width: 80px; height: 15px; }

                    /* Labels for segments */
                    .label {
                        position: absolute;
                        color: white;
                        font-weight: bold;
                        font-family: Arial, sans-serif;
                    }

                    .label.a { top: 0; left: 50px; }
                    .label.b { top: 60px; right: 0; }
                    .label.c { bottom: 60px; right: 0; }
                    .label.d { bottom: 0; left: 50px; }
                    .label.e { bottom: 60px; left: 0; }
                    .label.f { top: 60px; left: 0; }
                    .label.g { top: 80px; left: 50px; }

                    /* Display control */
                    .controls {
                        text-align: center;
                        margin-top: 20px;
                    }
                    .controls button {
                        padding: 10px 15px;
                        margin: 5px;
                        cursor: pointer;
                    }

                    .table-container {
                        display: flex;
                        justify-content: space-around;
                    }

                    .table-container div {
                        margin: 0 20px;
                    }
                </style>
                <script>
                    // Mapping for each number to corresponding segments (A-G)
                    const segmentMap = {
                        0: [1, 1, 1, 1, 1, 1, 0],
                        1: [0, 1, 1, 0, 0, 0, 0],
                        2: [1, 1, 0, 1, 1, 0, 1],
                        3: [1, 1, 1, 1, 0, 0, 1],
                        4: [0, 1, 1, 0, 0, 1, 1],
                        5: [1, 0, 1, 1, 0, 1, 1],
                        6: [1, 0, 1, 1, 1, 1, 1],
                        7: [1, 1, 1, 0, 0, 0, 0],
                        8: [1, 1, 1, 1, 1, 1, 1],
                        9: [1, 1, 1, 1, 0, 1, 1]
                    };

                    // Function to display a number on the 7-segment display
                    function displayNumber(num) {
                        const segments = document.querySelectorAll('.segment');
                        const states = segmentMap[num];
                        segments.forEach((segment, index) => {
                            if (states[index] === 1) {
                                segment.classList.add('on');
                            } else {
                                segment.classList.remove('on');
                            }
                        });
                    }
                </script>


                <h1>Digital logic</h1>

                <ol>

                    <li>
                        <h2>Binary Powers of Two</h2>
                        <table>
                            <thead>
                                <tr>
                                    <th>Power of Two</th>
                                    <th>Decimal</th>
                                    <th>Binary</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>-</td>
                                    <td>0</td>
                                    <td>00000000</td>
                                </tr>
                                <tr>
                                    <td>2<sup>0</sup></td>
                                    <td>1</td>
                                    <td>00000001</td>
                                </tr>
                                <tr>
                                    <td>2<sup>1</sup></td>
                                    <td>2</td>
                                    <td>00000010</td>
                                </tr>
                                <tr>
                                    <td>2<sup>2</sup></td>
                                    <td>4</td>
                                    <td>00000100</td>
                                </tr>
                                <tr>
                                    <td>2<sup>3</sup></td>
                                    <td>8</td>
                                    <td>00001000</td>
                                </tr>
                                <tr>
                                    <td>2<sup>4</sup></td>
                                    <td>16</td>
                                    <td>00010000</td>
                                </tr>
                                <tr>
                                    <td>2<sup>5</sup></td>
                                    <td>32</td>
                                    <td>00100000</td>
                                </tr>
                                <tr>
                                    <td>2<sup>6</sup></td>
                                    <td>64</td>
                                    <td>01000000</td>
                                </tr>
                                <tr>
                                    <td>2<sup>7</sup></td>
                                    <td>128</td>
                                    <td>10000000</td>
                                </tr>
                                <tr>
                                    <td>2<sup>8</sup></td>
                                    <td>256</td>
                                    <td>00000001 00000000</td>
                                </tr>
                                <tr>
                                    <td>2<sup>9</sup></td>
                                    <td>512</td>
                                    <td>00000010 00000000</td>
                                </tr>
                                <tr>
                                    <td>2<sup>10</sup></td>
                                    <td>1024</td>
                                    <td>00000100 00000000</td>
                                </tr>
                            </tbody>
                        </table>
                    </li>

                    <li>
                        <h2>Logic Gates</h2>
                        <a href="https://en.wikipedia.org/wiki/Logic_gate">
                            https://en.wikipedia.org/wiki/Logic_gate
                        </a>

                        <h3>AND and NOT</h3>
                        <div class="images_1row">
                            <img src="/common/cdn/knowledge_base/logic/and_not_gates.png"/>
                        </div>

                        <h3>NAND (NOT AND)</h3>
                        <div class="images_1row">
                            <img src="/common/cdn/knowledge_base/logic/nand_gate.png"/>
                        </div>

                        <h3>OR</h3>
                        <div class="images_1row">
                            <img src="/common/cdn/knowledge_base/logic/or_gate.png"/>
                        </div>
                    </li>
                    <li>
                        <h2>Logic Circuits</h2>
                        <h3>SRFF (Set-Reset Flip-Flop)</h3>
                        <div class="images_1row">
                            <img src="/common/cdn/knowledge_base/logic/set_reset_flip_flop.gif"/>
                        </div>

                        <h3>DFF (D Flip-Flop)</h3>
                        <div class="images_1row">
                            <img src="/common/cdn/knowledge_base/logic/d_flip_flop.gif"/>
                        </div>

                        <h3>MSDFF (Master-Slave D Flip-Flop)</h3>
                        <div class="images_1row">
                            <img src="/common/cdn/knowledge_base/logic/master_slave_d_flip_flop.gif"/>
                        </div>

                        <h3>TFF (Toggle Flip-Flop)</h3>
                        <div class="images_1row">
                            <img src="/common/cdn/knowledge_base/logic/toggle_flip_flop.gif"/>
                        </div>

                        <h3>Counter (4 bit)</h3>
                        <div class="images_1row">
                            <img src="/common/cdn/knowledge_base/logic/4bit_counter.gif"/>
                        </div>

                    </li>

                    <li>
                        <h2>Truth Tables</h2>
                        <h3>Two-Bit Truth Table (2<sup>2</sup> = 4)</h3>
                        <table>
                            <thead>
                                <tr>
                                    <th>A</th>
                                    <th>B</th>
                                    <th>A AND B</th>
                                    <th>A OR B</th>
                                    <th>A XOR B</th>
                                    <th>A NAND B</th>
                                    <th>NOT A</th>
                                    <th>NOT B</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                </tr>
                                <tr>
                                    <td>0</td>
                                    <td>1</td>
                                    <td>0</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>0</td>
                                    <td>1</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                </tr>
                            </tbody>
                        </table>
                        <h3>3-Bit Truth Table (2<sup>3</sup> = 8)</h3>
                        <table>
                            <thead>
                                <tr>
                                    <th>A</th>
                                    <th>B</th>
                                    <th>C</th>
                                    <th>A AND B AND C</th>
                                    <th>A OR B OR C</th>
                                    <th>A XOR B XOR C</th>
                                    <th>A NAND B NAND C</th>
                                    <th>NOT A</th>
                                    <th>NOT B</th>
                                    <th>NOT C</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                </tr>
                                <tr>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>1</td>
                                    <td>0</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <td>0</td>
                                    <td>1</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>0</td>
                                    <td>1</td>
                                </tr>
                                <tr>
                                    <td>0</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>0</td>
                                    <td>1</td>
                                    <td>0</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>0</td>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>0</td>
                                    <td>1</td>
                                    <td>1</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>0</td>
                                    <td>1</td>
                                    <td>0</td>
                                    <td>1</td>
                                    <td>0</td>
                                    <td>1</td>
                                    <td>0</td>
                                    <td>1</td>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>1</td>
                                    <td>0</td>
                                    <td>1</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>1</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                </tr>
                            </tbody>
                        </table>
                        <h3>4-Bit Truth Table (2<sup>4</sup> = 16)</h3>
                        <table>
                            <thead>
                                <tr>
                                    <th>A</th>
                                    <th>B</th>
                                    <th>C</th>
                                    <th>D</th>
                                    <th>A AND B AND C AND D</th>
                                    <th>A OR B OR C OR D</th>
                                    <th>A XOR B XOR C XOR D</th>
                                    <th>A NAND B NAND C NAND D</th>
                                    <th>NOT A</th>
                                    <th>NOT B</th>
                                    <th>NOT C</th>
                                    <th>NOT D</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>1</td><td>1</td><td>1</td><td>1</td><td>1</td></tr>
                                <tr><td>0</td><td>0</td><td>0</td><td>1</td><td>0</td><td>1</td><td>1</td><td>1</td><td>1</td><td>1</td><td>1</td><td>0</td></tr>
                                <tr><td>0</td><td>0</td><td>1</td><td>0</td><td>0</td><td>1</td><td>1</td><td>1</td><td>1</td><td>1</td><td>0</td><td>1</td></tr>
                                <tr><td>0</td><td>0</td><td>1</td><td>1</td><td>0</td><td>1</td><td>0</td><td>1</td><td>1</td><td>1</td><td>0</td><td>0</td></tr>
                                <tr><td>0</td><td>1</td><td>0</td><td>0</td><td>0</td><td>1</td><td>1</td><td>1</td><td>1</td><td>0</td><td>1</td><td>1</td></tr>
                                <tr><td>0</td><td>1</td><td>0</td><td>1</td><td>0</td><td>1</td><td>0</td><td>1</td><td>1</td><td>0</td><td>1</td><td>0</td></tr>
                                <tr><td>0</td><td>1</td><td>1</td><td>0</td><td>0</td><td>1</td><td>0</td><td>1</td><td>1</td><td>0</td><td>0</td><td>1</td></tr>
                                <tr><td>0</td><td>1</td><td>1</td><td>1</td><td>0</td><td>1</td><td>1</td><td>1</td><td>1</td><td>0</td><td>0</td><td>0</td></tr>
                                <tr><td>1</td><td>0</td><td>0</td><td>0</td><td>0</td><td>1</td><td>1</td><td>1</td><td>0</td><td>1</td><td>1</td><td>1</td></tr>
                                <tr><td>1</td><td>0</td><td>0</td><td>1</td><td>0</td><td>1</td><td>0</td><td>1</td><td>0</td><td>1</td><td>1</td><td>0</td></tr>
                                <tr><td>1</td><td>0</td><td>1</td><td>0</td><td>0</td><td>1</td><td>0</td><td>1</td><td>0</td><td>1</td><td>0</td><td>1</td></tr>
                                <tr><td>1</td><td>0</td><td>1</td><td>1</td><td>0</td><td>1</td><td>1</td><td>1</td><td>0</td><td>1</td><td>0</td><td>0</td></tr>
                                <tr><td>1</td><td>1</td><td>0</td><td>0</td><td>0</td><td>1</td><td>0</td><td>1</td><td>0</td><td>0</td><td>1</td><td>1</td></tr>
                                <tr><td>1</td><td>1</td><td>0</td><td>1</td><td>0</td><td>1</td><td>1</td><td>1</td><td>0</td><td>0</td><td>1</td><td>0</td></tr>
                                <tr><td>1</td><td>1</td><td>1</td><td>0</td><td>0</td><td>1</td><td>1</td><td>1</td><td>0</td><td>0</td><td>0</td><td>1</td></tr>
                                <tr><td>1</td><td>1</td><td>1</td><td>1</td><td>1</td><td>1</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td></tr>
                            </tbody>
                        </table>
                    </li>

                    <li>
                        <h2>7-Segment Display</h2>
                        <div>
                            <div class="seven-segment">
                                <div class="segment a"></div>
                                <div class="segment b"></div>
                                <div class="segment c"></div>
                                <div class="segment d"></div>
                                <div class="segment e"></div>
                                <div class="segment f"></div>
                                <div class="segment g"></div>

                                <!-- Labels for each segment -->
                                <div class="label a">A</div>
                                <div class="label b">B</div>
                                <div class="label c">C</div>
                                <div class="label d">D</div>
                                <div class="label e">E</div>
                                <div class="label f">F</div>
                                <div class="label g">G</div>
                            </div>

                            <div class="controls">
                                <button onclick="displayNumber(0)">0</button>
                                <button onclick="displayNumber(1)">1</button>
                                <button onclick="displayNumber(2)">2</button>
                                <button onclick="displayNumber(3)">3</button>
                                <button onclick="displayNumber(4)">4</button>
                                <button onclick="displayNumber(5)">5</button>
                                <button onclick="displayNumber(6)">6</button>
                                <button onclick="displayNumber(7)">7</button>
                                <button onclick="displayNumber(8)">8</button>
                                <button onclick="displayNumber(9)">9</button>
                            </div>
                        </div>
                    </div>
                    </li>

                    <li>
                        <h2>4-Bit to 7-Segment Display Translation Table</h2>
                        <table>
                            <thead>
                                <tr>
                                    <th>Decimal value</th>
                                    <th colspan="4">4-Bit Input</th>
                                    <th colspan="7">7-Segment Display (A-G)</th>
                                </tr>
                                <tr>
                                    <th>&nbsp;</th>
                                    <th>I0</th>
                                    <th>I1</th>
                                    <th>I2</th>
                                    <th>I3</th>
                                    <th>Segment A</th>
                                    <th>Segment B</th>
                                    <th>Segment C</th>
                                    <th>Segment D</th>
                                    <th>Segment E</th>
                                    <th>Segment F</th>
                                    <th>Segment G</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Binary 0000 -> Display 0 -->
                                <tr><td>0</td> <td>0</td><td>0</td><td>0</td><td>0</td><td>1</td><td>1</td><td>1</td><td>1</td><td>1</td><td>1</td><td>0</td></tr>
                                <!-- Binary 0001 -> Display 1 -->
                                <tr><td>1</td> <td>0</td><td>0</td><td>0</td><td>1</td><td>0</td><td>1</td><td>1</td><td>0</td><td>0</td><td>0</td><td>0</td></tr>
                                <!-- Binary 0010 -> Display 2 -->
                                <tr><td>2</td> <td>0</td><td>0</td><td>1</td><td>0</td><td>1</td><td>1</td><td>0</td><td>1</td><td>1</td><td>0</td><td>1</td></tr>
                                <!-- Binary 0011 -> Display 3 -->
                                <tr><td>3</td> <td>0</td><td>0</td><td>1</td><td>1</td><td>1</td><td>1</td><td>1</td><td>1</td><td>0</td><td>0</td><td>1</td></tr>
                                <!-- Binary 0100 -> Display 4 -->
                                <tr><td>4</td> <td>0</td><td>1</td><td>0</td><td>0</td><td>0</td><td>1</td><td>1</td><td>0</td><td>0</td><td>1</td><td>1</td></tr>
                                <!-- Binary 0101 -> Display 5 -->
                                <tr><td>5</td> <td>0</td><td>1</td><td>0</td><td>1</td><td>1</td><td>0</td><td>1</td><td>1</td><td>0</td><td>1</td><td>1</td></tr>
                                <!-- Binary 0110 -> Display 6 -->
                                <tr><td>6</td> <td>0</td><td>1</td><td>1</td><td>0</td><td>1</td><td>0</td><td>1</td><td>1</td><td>1</td><td>1</td><td>1</td></tr>
                                <!-- Binary 0111 -> Display 7 -->
                                <tr><td>7</td> <td>0</td><td>1</td><td>1</td><td>1</td><td>1</td><td>1</td><td>1</td><td>0</td><td>0</td><td>0</td><td>0</td></tr>
                                <!-- Binary 1000 -> Display 8 -->
                                <tr><td>8</td> <td>1</td><td>0</td><td>0</td><td>0</td><td>1</td><td>1</td><td>1</td><td>1</td><td>1</td><td>1</td><td>1</td></tr>
                                <!-- Binary 1001 -> Display 9 -->
                                <tr><td>9</td> <td>1</td><td>0</td><td>0</td><td>1</td><td>1</td><td>1</td><td>1</td><td>1</td><td>0</td><td>1</td><td>1</td></tr>
                            </tbody>
                        </table>
                    </li>

                    <li>
                        <h2>Canonical Logical Expressions</h2>
                        <h3>Segment A</h3>
                        <p>
                            (NOT I0 AND NOT I1 AND NOT I2 AND NOT I3) OR<br/>
                            (NOT I0 AND NOT I1 AND I2 AND NOT I3) OR<br/>
                            (NOT I0 AND NOT I1 AND I2 AND I3) OR<br/>
                            (NOT I0 AND I1 AND NOT I2 AND I3) OR<br/>
                            (NOT I0 AND I1 AND I2 AND NOT I3) OR<br/>
                            (NOT I0 AND I1 AND I2 AND I3) OR<br/>
                            (I0 AND NOT I1 AND NOT I2 AND NOT I3) OR<br/>
                            (I0 AND NOT I1 AND NOT I2 AND I3)
                        </p>
                        <h3>Segment B</h3>
                        <p>
                            (NOT I0 AND NOT I1 AND NOT I2 AND NOT I3) OR<br/>
                            (NOT I0 AND NOT I1 AND NOT I2 AND I3) OR<br/>
                            (NOT I0 AND NOT I1 AND I2 AND NOT I3) OR<br/>
                            (NOT I0 AND NOT I1 AND I2 AND I3) OR<br/>
                            (NOT I0 AND I1 AND NOT I2 AND NOT I3) OR<br/>
                            (NOT I0 AND I1 AND I2 AND I3) OR<br/>
                            (I0 AND NOT I1 AND NOT I2 AND NOT I3) OR<br/>
                            (I0 AND NOT I1 AND NOT I2 AND I3)
                        </p>
                        <h3>Segment C</h3>
                        <p>
                            (NOT I0 AND NOT I1 AND NOT I2 AND NOT I3) OR<br/>
                            (NOT I0 AND NOT I1 AND NOT I2 AND I3) OR<br/>
                            (NOT I0 AND I1 AND NOT I2 AND NOT I3) OR<br/>
                            (NOT I0 AND I1 AND NOT I2 AND I3) OR<br/>
                            (NOT I0 AND I1 AND I2 AND NOT I3) OR<br/>
                            (NOT I0 AND I1 AND I2 AND I3) OR<br/>
                            (I0 AND NOT I1 AND NOT I2 AND I3) OR<br/>
                            (I0 AND NOT I1 AND I2 AND I3)
                        </p>
                        <h3>Segment D</h3>
                        <p>
                            (NOT I0 AND NOT I1 AND NOT I2 AND NOT I3) OR<br/>
                            (NOT I0 AND NOT I1 AND I2 AND NOT I3) OR<br/>
                            (NOT I0 AND NOT I1 AND I2 AND I3) OR<br/>
                            (NOT I0 AND I1 AND NOT I2 AND I3) OR<br/>
                            (NOT I0 AND I1 AND I2 AND NOT I3) OR<br/>
                            (I0 AND NOT I1 AND NOT I2 AND NOT I3) OR<br/>
                            (I0 AND NOT I1 AND I2 AND NOT I3) OR<br/>
                            (I0 AND I1 AND NOT I2 AND I3)
                        </p>
                        <h3>Segment E</h3>
                        <p>
                            (NOT I0 AND NOT I1 AND NOT I2 AND NOT I3) OR<br/>
                            (NOT I0 AND NOT I1 AND I2 AND NOT I3) OR<br/>
                            (NOT I0 AND NOT I1 AND I2 AND I3) OR<br/>
                            (NOT I0 AND I1 AND I2 AND I3) OR<br/>
                            (I0 AND NOT I1 AND NOT I2 AND NOT I3) OR<br/>
                            (I0 AND I1 AND NOT I2 AND I3)
                        </p>
                        <h3>Segment F</h3>
                        <p>
                            (NOT I0 AND NOT I1 AND NOT I2 AND NOT I3) OR<br/>
                            (NOT I0 AND NOT I1 AND NOT I2 AND I3) OR<br/>
                            (NOT I0 AND I1 AND NOT I2 AND NOT I3) OR<br/>
                            (NOT I0 AND I1 AND NOT I2 AND I3) OR<br/>
                            (NOT I0 AND I1 AND I2 AND I3) OR<br/>
                            (I0 AND NOT I1 AND NOT I2 AND NOT I3) OR<br/>
                            (I0 AND NOT I1 AND I2 AND NOT I3)
                        </p>
                        <h3>Segment G</h3>
                        <p>
                            (NOT I0 AND NOT I1 AND NOT I2 AND NOT I3) OR<br/>
                            (NOT I0 AND NOT I1 AND I2 AND I3) OR<br/>
                            (NOT I0 AND I1 AND NOT I2 AND I3) OR<br/>
                            (I0 AND NOT I1 AND I2 AND I3) OR<br/>
                            (I0 AND I1 AND NOT I2 AND I3)
                        </p>
                    </li>

                    <li>
                        <h2>Software</h2>
                        <ol>
                            <li>Download and install:
                                <ul>
                                    <li><a href="https://sebastian.itch.io/digital-logic-sim">https://sebastian.itch.io/digital-logic-sim</a></li>
                                </ul>
                            </li>
                        </ol>
                    </li>

                    <li>
                        <h2>Logical Expression (Visual)</h2>
                        <div class="images_2row">
                            <?php
                                for ($i = 0; $i <= 9; $i++) {
                                    print('<img src="/common/cdn/knowledge_base/logic/unnormalized_decoder_' . $i . '.png" />');
                                }
                            ?>
                        </div>
                        <br clear="both"/>
                    </li>

                    <li>
                        <h2>Simplifying Logical Expressions</h2>
                        <ol>
                            <li>
                                <h3>Quine-McCluskey Algorithm</h3>
                                <p>
                                    <a href="https://en.wikipedia.org/wiki/Quine%E2%80%93McCluskey_algorithm">
                                        https://en.wikipedia.org/wiki/Quine%E2%80%93McCluskey_algorithm
                                    </a>
                                </p>
                            </li>
                            <li>
                                <h3>Karnaugh Map Method</h3>
                                <p>
                                    <a href="https://en.wikipedia.org/wiki/Karnaugh_map">
                                        https://en.wikipedia.org/wiki/Karnaugh_map
                                    </a>
                                </p>
                            </li>
                            <li>
                                <h3>Wolfram Alpha</h3>
                                <p>
                                    <a href="https://www.wolframalpha.com/input?i=%28NOT+I0+AND+NOT+I1+AND+NOT+I2+AND+NOT+I3%29">
                                        https://www.wolframalpha.com/input?i=%28NOT+I0+AND+NOT+I1+AND+NOT+I2+AND+NOT+I3%29
                                    </a>
                                </p>
                            </li>
                            <li>
                                <h3>Online tools</h3>
                                <p>
                                    <a href="https://www.dcode.fr/boolean-expressions-calculator">
                                        https://www.dcode.fr/boolean-expressions-calculator
                                    </a>
                                </p>
                            </li>
                            <li>
                                <h3>Open AI (ChatGPT)</h3>
                                <p>
                                    <a href="https://chatgpt.com/">
                                        https://chatgpt.com/
                                    </a>
                                </p>
                            </li>
                            <li>
                                <h3>Write Your Own JS or Python Tool</h3>

                                <label for="inputExpression">Enter Boolean Expression (Sum of Products):</label>
                                <br/>
                                <textarea style="width:90%;height:120px;" id="inputExpression" placeholder="(NOT I0 AND NOT I1 AND NOT I2 AND NOT I3) OR ...">
(NOT I0 AND NOT I1 AND NOT I2 AND NOT I3) OR
(NOT I0 AND NOT I1 AND I2 AND NOT I3) OR
(NOT I0 AND NOT I1 AND I2 AND I3) OR
(NOT I0 AND I1 AND NOT I2 AND I3) OR
(NOT I0 AND I1 AND I2 AND NOT I3) OR
(NOT I0 AND I1 AND I2 AND I3) OR
(I0 AND NOT I1 AND NOT I2 AND NOT I3) OR
(I0 AND NOT I1 AND NOT I2 AND I3)</textarea>

                                <br/>
                                <button onclick="simplify()">Simplify Expression</button>

                                <div id="output">Simplified Expression will appear here...</div>

                                <script>
                                    // Digital logic minimization using Quine-McCluskey algorithm

                                    // Logic minimization function using Quine-McCluskey Algorithm
                                    function parseExpression(expression) {
                                        const terms = expression.match(/\(.*?\)/g);  // Extract terms from input
                                        const variables = ['I0', 'I1', 'I2', 'I3'];  // Define variable names
                                        const minterms = [];

                                        terms.forEach(term => {
                                            let binary = '';
                                            variables.forEach(variable => {
                                                const positive = new RegExp(`\\b${variable}\\b`);
                                                const negative = new RegExp(`NOT\\s+${variable}`);
                                                if (negative.test(term)) {
                                                    binary += '0';
                                                } else if (positive.test(term)) {
                                                    binary += '1';
                                                } else {
                                                    binary += '-';
                                                }
                                            });
                                            minterms.push(binary);
                                        });

                                        return minterms;
                                    }

                                    function groupByOnes(minterms) {
                                        const groups = {};
                                        minterms.forEach(minterm => {
                                            const onesCount = minterm.replace(/[^1]/g, '').length;
                                            if (!groups[onesCount]) groups[onesCount] = [];
                                            groups[onesCount].push(minterm);
                                        });
                                        return groups;
                                    }

                                    function combineMinterms(minterms) {
                                        const combined = [];
                                        const used = new Set();

                                        for (let i = 0; i < minterms.length; i++) {
                                            for (let j = i + 1; j < minterms.length; j++) {
                                                const diffIndex = diffByOneBit(minterms[i], minterms[j]);
                                                if (diffIndex !== -1) {
                                                    const combinedTerm = replaceAt(minterms[i], diffIndex, '-');
                                                    combined.push(combinedTerm);
                                                    used.add(minterms[i]);
                                                    used.add(minterms[j]);
                                                }
                                            }
                                        }

                                        return { combined: [...new Set(combined)], unused: minterms.filter(m => !used.has(m)) };
                                    }

                                    function diffByOneBit(term1, term2) {
                                        let diffCount = 0, diffIndex = -1;
                                        for (let i = 0; i < term1.length; i++) {
                                            if (term1[i] !== term2[i]) {
                                                diffCount++;
                                                diffIndex = i;
                                            }
                                            if (diffCount > 1) return -1;
                                        }
                                        return diffCount === 1 ? diffIndex : -1;
                                    }

                                    function replaceAt(str, index, char) {
                                        return str.substr(0, index) + char + str.substr(index + 1);
                                    }

                                    function getPrimeImplicants(minterms) {
                                        let currentMinterms = minterms, allPrimeImplicants = [];
                                        while (currentMinterms.length > 0) {
                                            const { combined, unused } = combineMinterms(currentMinterms);
                                            allPrimeImplicants = allPrimeImplicants.concat(unused);
                                            currentMinterms = combined;
                                        }
                                        return allPrimeImplicants;
                                    }

                                    function binaryToExpression(binary) {
                                        const variables = ['I0', 'I1', 'I2', 'I3'];
                                        let expression = '';
                                        binary.split('').forEach((bit, index) => {
                                            if (bit === '1') expression += `${variables[index]} AND `;
                                            if (bit === '0') expression += `NOT ${variables[index]} AND `;
                                        });
                                        return expression.slice(0, -5);  // Remove trailing ' AND '
                                    }

                                    function minimizeLogic(expression) {
                                        const minterms = parseExpression(expression);       // Step 1: Parse
                                        const grouped = groupByOnes(minterms);              // Step 2: Group
                                        const allMinterms = Object.values(grouped).flat();  // Flatten grouped minterms
                                        const primeImplicants = getPrimeImplicants(allMinterms);  // Step 4: Get primes

                                        // Convert prime implicants to Boolean expressions
                                        const minimalForm = primeImplicants.map(binaryToExpression);

                                        // Group expressions with parentheses
                                        return minimalForm.map(expr => `(${expr})`).join(' OR ');
                                    }

                                    // Function to get the input, simplify the expression, and display the result
                                    function simplify() {
                                        const inputExpression = document.getElementById('inputExpression').value;
                                        const simplifiedExpression = minimizeLogic(inputExpression);
                                        document.getElementById('output').innerText = "Simplified Expression: " + simplifiedExpression;
                                    }
                                </script>

                            </li> <!-- -->
                        </ol>
                    </li>
                    
                    <li>
                        <h2>Minimizing Canonical Logical Expressions into Minimal Expressions</h2>

                        <h3>Segment A (02356789)</h3>
                        <h4>Canonical form</h4>
                        <p>
                            (NOT I0 AND NOT I1 AND NOT I2 AND NOT I3) OR<br/>
                            (NOT I0 AND NOT I1 AND I2 AND NOT I3) OR<br/>
                            (NOT I0 AND NOT I1 AND I2 AND I3) OR<br/>
                            (NOT I0 AND I1 AND NOT I2 AND I3) OR<br/>
                            (NOT I0 AND I1 AND I2 AND NOT I3) OR<br/>
                            (NOT I0 AND I1 AND I2 AND I3) OR<br/>
                            (I0 AND NOT I1 AND NOT I2 AND NOT I3) OR<br/>
                            (I0 AND NOT I1 AND NOT I2 AND I3)
                        </p>
                        <h4>Minimized form</h4>
                        <p>
                            (NOT I0 AND NOT I1 AND NOT I3) OR<br/>
                            (NOT I1 AND NOT I2 AND NOT I3) OR<br/>
                            (I0 AND NOT I1 AND NOT I2) OR<br/>
                            (NOT I0 AND I1 AND I3) OR<br/>
                            (NOT I0 AND I2)
                        </p>

                        <h3>Segment B (01234789)</h3>
                        <h4>Canonical form</h4>
                        <p>
                            (NOT I0 AND NOT I1 AND NOT I2 AND NOT I3) OR<br/>
                            (NOT I0 AND NOT I1 AND NOT I2 AND I3) OR<br/>
                            (NOT I0 AND NOT I1 AND I2 AND NOT I3) OR<br/>
                            (NOT I0 AND NOT I1 AND I2 AND I3) OR<br/>
                            (NOT I0 AND I1 AND NOT I2 AND NOT I3) OR<br/>
                            (NOT I0 AND I1 AND I2 AND I3) OR<br/>
                            (I0 AND NOT I1 AND NOT I2 AND NOT I3) OR<br/>
                            (I0 AND NOT I1 AND NOT I2 AND I3)
                        </p>
                        <h4>Minimized form</h4>
                        <p>
                            (NOT I0 AND NOT I2 AND NOT I3) OR<br/>
                            (NOT I0 AND I2 AND I3) OR<br/>
                            (NOT I0 AND NOT I1) OR<br/>
                            (NOT I1 AND NOT I2)
                        </p>

                        <h3>Segment C (013456789)</h3>
                        <h4>Canonical form</h4>
                        <p>
                            (NOT I0 AND NOT I1 AND NOT I2 AND NOT I3) OR<br/>
                            (NOT I0 AND NOT I1 AND NOT I2 AND I3) OR<br/>
                            (NOT I0 AND I1 AND NOT I2 AND NOT I3) OR<br/>
                            (NOT I0 AND I1 AND NOT I2 AND I3) OR<br/>
                            (NOT I0 AND I1 AND I2 AND NOT I3) OR<br/>
                            (NOT I0 AND I1 AND I2 AND I3) OR<br/>
                            (I0 AND NOT I1 AND NOT I2 AND I3) OR<br/>
                            (I0 AND NOT I1 AND I2 AND I3)
                        </p>
                        <h4>Minimized form</h4>
                        <p>
                            (NOT I1 AND NOT I2 AND I3) OR<br/>
                            (I0 AND NOT I1 AND I3) OR<br/>
                            (NOT I0 AND NOT I2) OR<br/>
                            (NOT I0 AND I1)
                        </p>

                        <h3>Segment D (0235789)</h3>
                        <h4>Canonical form</h4>
                        <p>
                            (NOT I0 AND NOT I1 AND NOT I2 AND NOT I3) OR<br/>
                            (NOT I0 AND NOT I1 AND I2 AND NOT I3) OR<br/>
                            (NOT I0 AND NOT I1 AND I2 AND I3) OR<br/>
                            (NOT I0 AND I1 AND NOT I2 AND I3) OR<br/>
                            (NOT I0 AND I1 AND I2 AND NOT I3) OR<br/>
                            (I0 AND NOT I1 AND NOT I2 AND NOT I3) OR<br/>
                            (I0 AND NOT I1 AND I2 AND NOT I3) OR<br/>
                            (I0 AND I1 AND NOT I2 AND I3)
                        </p>
                        <h4>Minimized form</h4>
                        <p>
                            (NOT I0 AND NOT I1 AND I2) OR<br/>
                            (NOT I0 AND I2 AND NOT I3) OR<br/>
                            (I1 AND NOT I2 AND I3) OR<br/>
                            (NOT I1 AND NOT I3)
                        </p>

                        <h3>Segment E (0268)</h3>
                        <h4>Canonical form</h4>
                        <p>
                            (NOT I0 AND NOT I1 AND NOT I2 AND NOT I3) OR<br/>
                            (NOT I0 AND NOT I1 AND I2 AND NOT I3) OR<br/>
                            (NOT I0 AND NOT I1 AND I2 AND I3) OR<br/>
                            (NOT I0 AND I1 AND I2 AND I3) OR<br/>
                            (I0 AND NOT I1 AND NOT I2 AND NOT I3) OR<br/>
                            (I0 AND I1 AND NOT I2 AND I3)
                        </p>
                        <h4>Minimized form</h4>
                        <p>
                            (I0 AND I1 AND NOT I2 AND I3) OR<br/>
                            (NOT I0 AND NOT I1 AND NOT I3) OR<br/>
                            (NOT I1 AND NOT I2 AND NOT I3) OR<br/>
                            (NOT I0 AND NOT I1 AND I2) OR<br/>
                            (NOT I0 AND I2 AND I3)
                        </p>

                        <h3>Segment F (045689)</h3>
                        <h4>Canonical form</h4>
                        <p>
                            (NOT I0 AND NOT I1 AND NOT I2 AND NOT I3) OR<br/>
                            (NOT I0 AND NOT I1 AND NOT I2 AND I3) OR<br/>
                            (NOT I0 AND I1 AND NOT I2 AND NOT I3) OR<br/>
                            (NOT I0 AND I1 AND NOT I2 AND I3) OR<br/>
                            (NOT I0 AND I1 AND I2 AND I3) OR<br/>
                            (I0 AND NOT I1 AND NOT I2 AND NOT I3) OR<br/>
                            (I0 AND NOT I1 AND I2 AND NOT I3)
                        </p>
                        <h4>Minimized form</h4>
                        <p>
                            (NOT I1 AND NOT I2 AND NOT I3) OR<br/>
                            (I0 AND NOT I1 AND NOT I3) OR<br/>
                            (NOT I0 AND I1 AND I3) OR<br/>
                            (NOT I0 AND NOT I2)
                        </p>

                        <h3>Segment G (2345689)</h3>
                        <h4>Canonical form</h4>
                        <p>
                            (NOT I0 AND NOT I1 AND NOT I2 AND NOT I3) OR<br/>
                            (NOT I0 AND NOT I1 AND I2 AND I3) OR<br/>
                            (NOT I0 AND I1 AND NOT I2 AND I3) OR<br/>
                            (I0 AND NOT I1 AND I2 AND I3) OR<br/>
                            (I0 AND I1 AND NOT I2 AND I3)
                        </p>
                        <h4>Minimized form</h4>
                        <p>
                            (NOT I0 AND NOT I1 AND NOT I2 AND NOT I3) OR<br/>
                            (NOT I1 AND I2 AND I3) OR<br/>
                            (I1 AND NOT I2 AND I3)
                        </p>
                    </li>

                    <li>
                        <h2>Summarizing</h2>
                        <table>
                            <tr>
                                <th>Segment</th>
                                <th>Form</th>
                                <th>AND</th>
                                <th>NOT</th>
                                <th>OR</th>
                                <th>TOTAL</th>
                                <th>Reduction (%)</th>
                            </tr>

                            <tr>
                                <td>A</td>
                                <td>Canonical</td>
                                <td>22</td>
                                <td>25</td>
                                <td>7</td>
                                <td>54</td>
                                <td></td>
                            </tr>
                            
                            <tr>
                                <td>A</td>
                                <td>Minimized</td>
                                <td>12</td>
                                <td>11</td>
                                <td>4</td>
                                <td>27</td>
                                <td>50.0</td>
                            </tr>
                            
                            <tr>
                                <td>B</td>
                                <td>Canonical</td>
                                <td>22</td>
                                <td>24</td>
                                <td>7</td>
                                <td>53</td>
                                <td></td>
                            </tr>
                            
                            <tr>
                                <td>B</td>
                                <td>Minimized</td>
                                <td>9</td>
                                <td>9</td>
                                <td>4</td>
                                <td>22</td>
                                <td>58.49</td>
                            </tr>
                            
                            <tr>
                                <td>C</td>
                                <td>Canonical</td>
                                <td>22</td>
                                <td>23</td>
                                <td>7</td>
                                <td>52</td>
                                <td></td>
                            </tr>
                            
                            <tr>
                                <td>C</td>
                                <td>Minimized</td>
                                <td>8</td>
                                <td>7</td>
                                <td>4</td>
                                <td>19</td>
                                <td>63.46</td>
                            </tr>
                            
                            <tr>
                                <td>D</td>
                                <td>Canonical</td>
                                <td>22</td>
                                <td>23</td>
                                <td>7</td>
                                <td>52</td>
                                <td></td>
                            </tr>
                            
                            <tr>
                                <td>D</td>
                                <td>Minimized</td>
                                <td>9</td>
                                <td>8</td>
                                <td>4</td>
                                <td>21</td>
                                <td>59.62</td>
                            </tr>
                            
                            <tr>
                                <td>E</td>
                                <td>Canonical</td>
                                <td>19</td>
                                <td>22</td>
                                <td>6</td>
                                <td>47</td>
                                <td></td>
                            </tr>
                            
                            <tr>
                                <td>E</td>
                                <td>Minimized</td>
                                <td>11</td>
                                <td>10</td>
                                <td>5</td>
                                <td>26</td>
                                <td>44.68</td>
                            </tr>
                            
                            <tr>
                                <td>F</td>
                                <td>Canonical</td>
                                <td>20</td>
                                <td>21</td>
                                <td>6</td>
                                <td>47</td>
                                <td></td>
                            </tr>
                            
                            <tr>
                                <td>F</td>
                                <td>Minimized</td>
                                <td>8</td>
                                <td>8</td>
                                <td>4</td>
                                <td>20</td>
                                <td>57.45</td>
                            </tr>
                            
                            <tr>
                                <td>G</td>
                                <td>Canonical</td>
                                <td>14</td>
                                <td>16</td>
                                <td>4</td>
                                <td>34</td>
                                <td></td>
                            </tr>
                            
                            <tr>
                                <td>G</td>
                                <td>Minimized</td>
                                <td>7</td>
                                <td>6</td>
                                <td>3</td>
                                <td>16</td>
                                <td>52.94</td>
                            </tr>

                            <tr>
                                <td colspan="5"><b>Grand Total</b></td>
                                <td><b>339</b> / <b>151</b></td>
                                <td><b>55.46</b></td>
                            </tr>
                        </table>
                    </li>

                    <li>
                        <h2>Putting it all together</h2>
                        <div class="images_1row">
                            <img src="/common/cdn/knowledge_base/logic/7_segment_display_with_decoder_counter.gif"/>
                        </div>
                    </li>

                </ol>
                
				
			<?php
		}

    }

?>